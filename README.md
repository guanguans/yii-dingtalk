# yii-dingtalk

> Based on [mingyoung/dingtalk](https://github.com/mingyoung/dingtalk) developed a DingTalk expansion package adapted to Yii. - 基于 [mingyoung/dingtalk](https://github.com/mingyoung/dingtalk) 开发的适配于 Yii 的钉钉扩展包。

[![Tests](https://github.com/guanguans/yii-dingtalk/workflows/Tests/badge.svg)](https://github.com/guanguans/yii-dingtalk/actions)
[![Check & fix styling](https://github.com/guanguans/yii-dingtalk/workflows/Check%20&%20fix%20styling/badge.svg)](https://github.com/guanguans/yii-dingtalk/actions)
[![codecov](https://codecov.io/gh/guanguans/yii-dingtalk/branch/main/graph/badge.svg?token=URGFAWS6S4)](https://codecov.io/gh/guanguans/yii-dingtalk)
[![Latest Stable Version](https://poser.pugx.org/guanguans/yii-dingtalk/v)](//packagist.org/packages/guanguans/yii-dingtalk)
[![Total Downloads](https://poser.pugx.org/guanguans/yii-dingtalk/downloads)](//packagist.org/packages/guanguans/yii-dingtalk)
[![License](https://poser.pugx.org/guanguans/yii-dingtalk/license)](//packagist.org/packages/guanguans/yii-dingtalk)

## Requirement

* Yii >= 2.0

## Installation

``` bash
$ composer require guanguans/yii-dingtalk --prefer-dist -vvv
```

## Configuration

Add to the components of the Yii2 configuration file `config/main.php`:

``` php
'components' => [
    // ...
    'dingtalk' => [
        'class' => \Guanguans\YiiDingTalk\DingTalk::class,
        /*
         *【必填】企业 corpId
         */
        'corp_id' => 'dingd3ir8195906jfo93',
        /*
         *【必填】应用 AppKey
         */
        'app_key' => 'dingwu33fo1fjc0fszad',
        /*
         *【必填】应用 AppSecret
         */
        'app_secret' => 'RsuMFgEIY3jg5UMidkvwpzEobWjf9Fcu3ogzULm54WcV7j9fi3fJlUshk',
        /*
         *【选填】加解密
         * 此处的 `token` 和 `aes_key` 用于事件通知的加解密
         * 如果你用到事件回调功能，需要配置该两项
         */
        'token' => 'uhl3CZbtsmf93bFPanmMenhWwrqbSwPc',
        'aes_key' => 'qZEOmHU2qYYk6n6vqLfi3FAhcp9bGA2kgbfnsXDrGgN',
        /*
         *【选填】后台免登配置信息
         * 如果你用到应用管理后台免登功能，需要配置该项
         */
        'sso_secret' => 'Fx9_i5dSW5tpGtjalksdf98JF8uj32xb4NJQR5G9-VSchasd98asfdMmLR',
        /*
         *【选填】第三方网站 OAuth 授权
         * 如果你用到扫码登录、钉钉内免登和密码登录第三方网站，需要配置该项
         */
        'oauths' => [
            /*
            |-------------------------------------------
            | `app-01` 为你自定义的名称，不要重复即可
            |-------------------------------------------
            | 数组内需要配置 `client_id`, `client_secret`, `scope` 和 `redirect` 四项
            |
            | `client_id` 为钉钉登录应用的 `appId`
            | `client_secret` 为钉钉登录应用的 `appSecret`
            | `scope`:
            |     - 扫码登录第三方网站和密码登录第三方网站填写 `snsapi_login`
            |     - 钉钉内免登第三方网站填写 `snsapi_auth`
            | `redirect` 为回调地址
            */
            'app-01' => [
                'client_id' => 'dingoaxmia0afj234f7',
                'client_secret' => 'c4x4el0M6JqMC3VQP80-cFasdf98902jklFSUVdAOIfasdo98a2',
                'scope' => 'snsapi_login',
                'redirect' => 'https://easydingtalk.org/callback',
            ],
            /*
             * 可配置多个 OAuth 应用，数组内内容同上
             */
            'app-02' => [
                // ...
            ],
        ],
    ],
    // ...
],
```

## Usage(Please refer to [mingyoung/dingtalk](https://github.com/mingyoung/dingtalk))

Get an instance:

``` php
// \EasyDingTalk\Application
Yii::$app->dingtalk->app;
Yii::$app->dingtalk->getApp();

// Override the options in the global configuration
Yii::$app->dingtalk->setOptions([
    'corp_id' => 'dingd3ir8195906jfo93',
    'app_key' => 'dingwu33fo1fjc0fszad',
    'app_secret' => 'RsuMFgEIY3jg5UMidkvwpzEobWjf9Fcu3oLqLyCUIgzULm54WcV7j9fi3fJlUshk',
])->app;

// \EasyDingTalk\Auth\SsoClient
Yii::$app->dingtalk->getSso();

// \EasyDingTalk\Auth\OAuthClient
Yii::$app->dingtalk->getOauth();

// \EasyDingTalk\User\Client
Yii::$app->dingtalk->getUser();

// \EasyDingTalk\Department\Client
Yii::$app->dingtalk->getDepartment();

// \EasyDingTalk\Process\Client
Yii::$app->dingtalk->getProcess();

// \EasyDingTalk\Role\Client
Yii::$app->dingtalk->getRole();

// \EasyDingTalk\Contact\Client
Yii::$app->dingtalk->getContact();

// \EasyDingTalk\Calendar\Client
Yii::$app->dingtalk->getCalendar();

// \EasyDingTalk\Attendance\Client
Yii::$app->dingtalk->getAttendance();

// \EasyDingTalk\Attendance\Client
Yii::$app->dingtalk->getCheckin();

// \EasyDingTalk\Report\Client
Yii::$app->dingtalk->getReport();

// \EasyDingTalk\Blackboard\Client
Yii::$app->dingtalk->getBlackboard();

// \EasyDingTalk\Microapp\Client
Yii::$app->dingtalk->getMicroapp();

// \EasyDingTalk\Health\Client
Yii::$app->dingtalk->getHealth();

// \EasyDingTalk\Health\Client
Yii::$app->dingtalk->getCallback();

// \EasyDingTalk\Kernel\Server
Yii::$app->dingtalk->getServer();
```

## Testing

``` bash
$ composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

* [guanguans](https://github.com/guanguans)
* [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
