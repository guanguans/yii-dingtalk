<?php

/**
 * This file is part of the guanguans/yii-dingtalk.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiDingTalk;

use EasyDingTalk\Application;
use Yii;
use yii\base\Component;

class DingTalk extends Component
{
    /**
     * @var string
     */
    public $corp_id;

    /**
     * @var string
     */
    public $app_key;

    /**
     * @var string
     */
    public $app_secret;

    /**
     * @var string
     */
    public $token;

    /**
     * @var string
     */
    public $aes_key;

    /**
     * @var string
     */
    public $sso_secret;

    /**
     * @var array
     */
    public $oauth = [];

    /**
     * @var array
     */
    public $options = [];

    /**
     * @var \EasyDingTalk\Application
     */
    private static $_app;

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        parent::init();

        $this->options = [
            'corp_id' => $this->corp_id,
            'app_key' => $this->app_key,
            'app_secret' => $this->app_secret,
            'token' => $this->token,
            'aes_key' => $this->aes_key,
            'sso_secret' => $this->sso_secret,
            'oauth' => $this->oauth,
        ];
    }

    /**
     * @return \EasyDingTalk\Application
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getApp(array $options = [])
    {
        $options && $this->options = array_merge($this->options, $options);

        if (! static::$_app instanceof \EasyDingTalk\Application || $options) {
            static::$_app = Yii::createObject(Application::class, $this->options);
        }

        return static::$_app;
    }
}
