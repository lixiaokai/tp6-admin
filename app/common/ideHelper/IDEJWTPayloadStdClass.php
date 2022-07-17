<?php

namespace app\common\ideHelper;

use stdClass;

/**
 * JWT 解码 - IDE 提示.
 */
class IDEJWTPayloadStdClass extends stdClass
{
    /**
     * @var string 签发者
     */
    public string $iss = 'auth';
    /**
     * @var string 主题
     */
    public string $sub = 'token';

    /**
     * @var int 签名时间
     */
    public int $iat;

    /**
     * @var int 过期时间
     */
    public int $exp;

    /**
     * @var int 用户 UID
     */
    public int $uid;
}
