<?php
declare(strict_types=1);

namespace app\common\constant;

use app\common\constant\library\BaseConstant;

/**
 * 登录类型 - 枚举常量类.
 *
 * @method static getText(string $code)
 */
class LoginType extends BaseConstant
{
    /**
     * 登录类型 - 手机.
     *
     * @Text("手机登录")
     */
    public const PHONE = 'phone';

    /**
     * 登录类型 - 微信.
     *
     * @Text("微信登录")
     */
    public const WECHAT = 'wechat';

    /**
     * 登录类型 - QQ.
     *
     * @Text("QQ 登录")
     */
    public const QQ = 'qq';
}
