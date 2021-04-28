<?php

/**
 * This file is part of the guanguans/yii-dingtalk.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\YiiDingTalk\Tests;

use EasyDingTalk\Application;
use Yii;

class DingTalkTest extends TestCase
{
    public function testGetApp()
    {
        $this->assertInstanceOf(Application::class, Yii::$app->dingtalk->app);
        $this->assertInstanceOf(Application::class, Yii::$app->dingtalk->getApp());
        $this->assertInstanceOf(Application::class, Yii::$app->dingtalk->getApp(['mack_key' => 'mack_value']));
        $this->assertTrue(Yii::$app->dingtalk->app === Yii::$app->dingtalk->getApp());
        $this->assertTrue(Yii::$app->dingtalk->app !== Yii::$app->dingtalk->getApp(['mack_key' => 'mack_value']));
    }
}
