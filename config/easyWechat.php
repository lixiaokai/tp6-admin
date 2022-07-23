<?php
declare(strict_types=1);

/**
 * easyWechat 配置.
 *
 * 接口请求相关配置，超时时间等，具体可用参数请参考：
 * @see https://github.com/symfony/symfony/blob/5.3/src/Symfony/Contracts/HttpClient/HttpClientInterface.php
 */
return [
    'miniApp' => [
        // 默认的小程序配置，也可以把 default 改成对应小程序标识
        'default' => [
            'app_id' => env('wechat.mini_program_appid', ''),
            'secret' => env('wechat.mini_program_secret', ''),
            'token' => '',
            'aes_key' => '',

            'http' => [
                'throw'  => true, // 状态码非 200、300 时是否抛出异常，默认为开启
                'timeout' => 5.0,
                // 'base_uri' => 'https://api.weixin.qq.com/', // 如果你在国外想要覆盖默认的 url 的时候才使用，根据不同的模块配置不同的 uri

                'retry' => true, // 使用默认重试配置
                //  'retry' => [
                //      // 仅以下状态码重试
                //      'http_codes' => [429, 500]
                //       // 最大重试次数
                //      'max_retries' => 3,
                //      // 请求间隔 (毫秒)
                //      'delay' => 1000,
                //      // 如果设置，每次重试的等待时间都会增加这个系数
                //      // (例如. 首次:1000ms; 第二次: 3 * 1000ms; etc.)
                //      'multiplier' => 3
                //  ],
            ],
        ]
    ],
    'officialAccount' => [
        'default' => [

            /**
             * 账号基本信息，请从微信公众平台/开放平台获取
             */
            'app_id' => env('wechat.official_account_appid', ''),
            'secret' => env('wechat.official_account_secret', ''),
            'token'   => '', // Token
            'aes_key' => '', // EncodingAESKey，兼容与安全模式下请一定要填写！！！

            /**
             * OAuth 配置
             *
             * scopes：公众平台 （ snsapi_userinfo / snsapi_base )，开放平台: snsapi_login
             * callback：OAuth 授权完成后的回调页地址
             */
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                // 'callback' => '/index/oauth/callback', easyWechat 文档说的 callback 参数是错的，需要改成 redirect_url
                'redirect_url' => 'http://127.0.0.1:8000/index/oauth/wechat/callback',
            ],

            /**
             * 接口请求相关配置，超时时间等，具体可用参数请参考：
             * @see https://github.com/symfony/symfony/blob/5.3/src/Symfony/Contracts/HttpClient/HttpClientInterface.php
             */
            'http' => [
                'timeout' => 5.0,
                // 'base_uri' => 'https://api.weixin.qq.com/', // 如果你在国外想要覆盖默认的 url 的时候才使用，根据不同的模块配置不同的 uri

                'retry' => true, // 使用默认重试配置
                //  'retry' => [
                //      // 仅以下状态码重试
                //      'http_codes' => [429, 500]
                //       // 最大重试次数
                //      'max_retries' => 3,
                //      // 请求间隔 (毫秒)
                //      'delay' => 1000,
                //      // 如果设置，每次重试的等待时间都会增加这个系数
                //      // (例如. 首次:1000ms; 第二次: 3 * 1000ms; etc.)
                //      'multiplier' => 3
                //  ],
            ],
        ],
    ],
];
