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
    public $oauths = [];

    /**
     * @var array
     */
    public $options = [];

    /**
     * @var \EasyDingTalk\Application
     */
    private static $_app;

    /**
     * @var \EasyDingTalk\Auth\SsoClient
     */
    private static $_sso;

    /**
     * @var \EasyDingTalk\Auth\OAuthClient
     */
    private static $_oauth;

    /**
     * @var \EasyDingTalk\User\Client
     */
    private static $_user;

    /**
     * @var \EasyDingTalk\Department\Client
     */
    private static $_department;

    /**
     * @var \EasyDingTalk\Process\Client
     */
    private static $_process;

    /**
     * @var \EasyDingTalk\Role\Client
     */
    private static $_role;

    /**
     * @var \EasyDingTalk\Contact\Client
     */
    private static $_contact;

    /**
     * @var \EasyDingTalk\Calendar\Client
     */
    private static $_calendar;

    /**
     * @var \EasyDingTalk\Attendance\Client
     */
    private static $_attendance;

    /**
     * @var \EasyDingTalk\Checkin\Client
     */
    private static $_checkin;

    /**
     * @var \EasyDingTalk\Report\Client
     */
    private static $_report;

    /**
     * @var \EasyDingTalk\Blackboard\Client
     */
    private static $_blackboard;

    /**
     * @var \EasyDingTalk\Microapp\Client
     */
    private static $_microapp;

    /**
     * @var \EasyDingTalk\Health\Client
     */
    private static $_health;

    /**
     * @var \EasyDingTalk\Callback\Client
     */
    private static $_callback;

    /**
     * @var \EasyDingTalk\Kernel\Server
     */
    private static $_server;

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
            'oauth' => $this->oauths,
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

    /**
     * @return \EasyDingTalk\Auth\SsoClient
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getSso(array $options = [])
    {
        return $this->getApp($options)->sso;
    }

    /**
     * @return \EasyDingTalk\Auth\OAuthClient
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getOauth(array $options = [])
    {
        return $this->getApp($options)->oauth;
    }

    /**
     * @return \EasyDingTalk\User\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getUser(array $options = [])
    {
        return $this->getApp($options)->user;
    }

    /**
     * @return \EasyDingTalk\Department\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getDepartment(array $options = [])
    {
        return $this->getApp($options)->department;
    }

    /**
     * @return \EasyDingTalk\Process\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getProcess(array $options = [])
    {
        return $this->getApp($options)->process;
    }

    /**
     * @return \EasyDingTalk\Role\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getRole(array $options = [])
    {
        return $this->getApp($options)->role;
    }

    /**
     * @return \EasyDingTalk\Contact\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getContact(array $options = [])
    {
        return $this->getApp($options)->contact;
    }

    /**
     * @return \EasyDingTalk\Calendar\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getCalendar(array $options = [])
    {
        return $this->getApp($options)->calendar;
    }

    /**
     * @return \EasyDingTalk\Attendance\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getAttendance(array $options = [])
    {
        return $this->getApp($options)->attendance;
    }

    /**
     * @return \EasyDingTalk\Checkin\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getCheckin(array $options = [])
    {
        return $this->getApp($options)->checkin;
    }

    /**
     * @return \EasyDingTalk\Report\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getReport(array $options = [])
    {
        return $this->getApp($options)->report;
    }

    /**
     * @return \EasyDingTalk\Blackboard\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getBlackboard(array $options = [])
    {
        return $this->getApp($options)->blackboard;
    }

    /**
     * @return \EasyDingTalk\Microapp\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getMicroapp(array $options = [])
    {
        return $this->getApp($options)->microapp;
    }

    /**
     * @return \EasyDingTalk\Health\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getHealth(array $options = [])
    {
        return $this->getApp($options)->health;
    }

    /**
     * @return \EasyDingTalk\Callback\Client
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getCallback(array $options = [])
    {
        return $this->getApp($options)->callback;
    }

    /**
     * @return \EasyDingTalk\Kernel\Server
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function getServer(array $options = [])
    {
        return $this->getApp($options)->server;
    }
}
