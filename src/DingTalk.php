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
    protected $options = [];

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

        $this->setOptions([
            'corp_id' => $this->corp_id,
            'app_key' => $this->app_key,
            'app_secret' => $this->app_secret,
            'token' => $this->token,
            'aes_key' => $this->aes_key,
            'sso_secret' => $this->sso_secret,
            'oauth' => $this->oauths,
        ]);
    }

    /**
     * @return $this
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function setOptions(array $options)
    {
        $options && $this->options = array_merge($this->options, $options);

        if ($options || ! static::$_app instanceof \EasyDingTalk\Application) {
            static::$_app = Yii::createObject(Application::class, $this->options);
        }

        return $this;
    }

    /**
     * @param null $key
     *
     * @return \EasyDingTalk\Application|mixed
     */
    public function getApp($key = null)
    {
        if (null === $key) {
            return static::$_app;
        }

        return static::$_app[$key];
    }

    /**
     * @return \EasyDingTalk\Auth\SsoClient
     */
    public function getSso()
    {
        return $this->getApp()->sso;
    }

    /**
     * @return \EasyDingTalk\Auth\OAuthClient
     */
    public function getOauth()
    {
        return $this->getApp()->oauth;
    }

    /**
     * @return \EasyDingTalk\User\Client
     */
    public function getUser()
    {
        return $this->getApp()->user;
    }

    /**
     * @return \EasyDingTalk\Department\Client
     */
    public function getDepartment()
    {
        return $this->getApp()->department;
    }

    /**
     * @return \EasyDingTalk\Process\Client
     */
    public function getProcess()
    {
        return $this->getApp()->process;
    }

    /**
     * @return \EasyDingTalk\Role\Client
     */
    public function getRole()
    {
        return $this->getApp()->role;
    }

    /**
     * @return \EasyDingTalk\Contact\Client
     */
    public function getContact()
    {
        return $this->getApp()->contact;
    }

    /**
     * @return \EasyDingTalk\Calendar\Client
     */
    public function getCalendar()
    {
        return $this->getApp()->calendar;
    }

    /**
     * @return \EasyDingTalk\Attendance\Client
     */
    public function getAttendance()
    {
        return $this->getApp()->attendance;
    }

    /**
     * @return \EasyDingTalk\Checkin\Client
     */
    public function getCheckin()
    {
        return $this->getApp()->checkin;
    }

    /**
     * @return \EasyDingTalk\Report\Client
     */
    public function getReport()
    {
        return $this->getApp()->report;
    }

    /**
     * @return \EasyDingTalk\Blackboard\Client
     */
    public function getBlackboard()
    {
        return $this->getApp()->blackboard;
    }

    /**
     * @return \EasyDingTalk\Microapp\Client
     */
    public function getMicroapp()
    {
        return $this->getApp()->microapp;
    }

    /**
     * @return \EasyDingTalk\Health\Client
     */
    public function getHealth()
    {
        return $this->getApp()->health;
    }

    /**
     * @return \EasyDingTalk\Callback\Client
     */
    public function getCallback()
    {
        return $this->getApp()->callback;
    }

    /**
     * @return \EasyDingTalk\Kernel\Server
     */
    public function getServer()
    {
        return $this->getApp()->server;
    }
}
