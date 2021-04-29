<?php

/**
 * This file is part of the guanguans/yii-dingtalk.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiDingTalk\Tests;

use Yii;

class DingTalkTest extends TestCase
{
    public function testGetApp()
    {
        $this->assertInstanceOf(\EasyDingTalk\Application::class, Yii::$app->dingtalk->app);
        $this->assertInstanceOf(\EasyDingTalk\Application::class, Yii::$app->dingtalk->getApp());
        $this->assertInstanceOf(\EasyDingTalk\Application::class, Yii::$app->dingtalk->getApp(['mack_key' => 'mack_value']));
        $this->assertTrue(Yii::$app->dingtalk->app === Yii::$app->dingtalk->getApp());
        $this->assertTrue(Yii::$app->dingtalk->app !== Yii::$app->dingtalk->getApp(['mack_key' => 'mack_value']));
        $this->assertTrue(Yii::$app->dingtalk->app !== Yii::$app->dingtalk->setOptions(['mack_key' => 'mack_value'])->app);
    }

    public function testGetSso()
    {
        $this->assertInstanceOf(\EasyDingTalk\Auth\SsoClient::class, Yii::$app->dingtalk->sso);
        $this->assertInstanceOf(\EasyDingTalk\Auth\SsoClient::class, Yii::$app->dingtalk->getSso());
    }

    public function testGetOauth()
    {
        $this->assertInstanceOf(\EasyDingTalk\Auth\OAuthClient::class, Yii::$app->dingtalk->oauth);
        $this->assertInstanceOf(\EasyDingTalk\Auth\OAuthClient::class, Yii::$app->dingtalk->getOauth());
    }

    public function testGetUser()
    {
        $this->assertInstanceOf(\EasyDingTalk\User\Client::class, Yii::$app->dingtalk->user);
        $this->assertInstanceOf(\EasyDingTalk\User\Client::class, Yii::$app->dingtalk->getUser());
    }

    public function testGetDepartment()
    {
        $this->assertInstanceOf(\EasyDingTalk\Department\Client::class, Yii::$app->dingtalk->department);
        $this->assertInstanceOf(\EasyDingTalk\Department\Client::class, Yii::$app->dingtalk->getDepartment());
    }

    public function testGetProcess()
    {
        $this->assertInstanceOf(\EasyDingTalk\Process\Client::class, Yii::$app->dingtalk->process);
        $this->assertInstanceOf(\EasyDingTalk\Process\Client::class, Yii::$app->dingtalk->getProcess());
    }

    public function testGetRole()
    {
        $this->assertInstanceOf(\EasyDingTalk\Role\Client::class, Yii::$app->dingtalk->role);
        $this->assertInstanceOf(\EasyDingTalk\Role\Client::class, Yii::$app->dingtalk->getRole());
    }

    public function testGetContact()
    {
        $this->assertInstanceOf(\EasyDingTalk\Contact\Client::class, Yii::$app->dingtalk->contact);
        $this->assertInstanceOf(\EasyDingTalk\Contact\Client::class, Yii::$app->dingtalk->getContact());
    }

    public function testGetCalendar()
    {
        $this->assertInstanceOf(\EasyDingTalk\Calendar\Client::class, Yii::$app->dingtalk->calendar);
        $this->assertInstanceOf(\EasyDingTalk\Calendar\Client::class, Yii::$app->dingtalk->getCalendar());
    }

    public function testGetAttendance()
    {
        $this->assertInstanceOf(\EasyDingTalk\Attendance\Client::class, Yii::$app->dingtalk->attendance);
        $this->assertInstanceOf(\EasyDingTalk\Attendance\Client::class, Yii::$app->dingtalk->getAttendance());
    }

    public function testGetCheckin()
    {
        $this->assertInstanceOf(\EasyDingTalk\Checkin\Client::class, Yii::$app->dingtalk->checkin);
        $this->assertInstanceOf(\EasyDingTalk\Checkin\Client::class, Yii::$app->dingtalk->getCheckin());
    }

    public function testGetReport()
    {
        $this->assertInstanceOf(\EasyDingTalk\Report\Client::class, Yii::$app->dingtalk->report);
        $this->assertInstanceOf(\EasyDingTalk\Report\Client::class, Yii::$app->dingtalk->getReport());
    }

    public function testGetBlackboard()
    {
        $this->assertInstanceOf(\EasyDingTalk\Blackboard\Client::class, Yii::$app->dingtalk->blackboard);
        $this->assertInstanceOf(\EasyDingTalk\Blackboard\Client::class, Yii::$app->dingtalk->getBlackboard());
    }

    public function testGetMicroapp()
    {
        $this->assertInstanceOf(\EasyDingTalk\Microapp\Client::class, Yii::$app->dingtalk->microapp);
        $this->assertInstanceOf(\EasyDingTalk\Microapp\Client::class, Yii::$app->dingtalk->getMicroapp());
    }

    public function testGetHealth()
    {
        $this->assertInstanceOf(\EasyDingTalk\Health\Client::class, Yii::$app->dingtalk->health);
        $this->assertInstanceOf(\EasyDingTalk\Health\Client::class, Yii::$app->dingtalk->getHealth());
    }

    public function testGetCallback()
    {
        $this->assertInstanceOf(\EasyDingTalk\Callback\Client::class, Yii::$app->dingtalk->callback);
        $this->assertInstanceOf(\EasyDingTalk\Callback\Client::class, Yii::$app->dingtalk->getCallback());
    }

    public function testGetServer()
    {
        $this->assertInstanceOf(\EasyDingTalk\Kernel\Server::class, Yii::$app->dingtalk->server);
        $this->assertInstanceOf(\EasyDingTalk\Kernel\Server::class, Yii::$app->dingtalk->getServer());
    }
}
