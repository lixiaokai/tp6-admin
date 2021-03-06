<?php
declare(strict_types=1);

namespace app\common\constant;

use app\common\constant\library\BaseConstant;

/**
 * 标准状态 - 枚举常量类.
 *
 * @method static getColor(string $code)
 * @method static getText(string $code)
 */
class Status extends BaseConstant
{
    /**
     * 通用状态 - 启用.
     *
     * @Color("green")
     * @Text("启用")
     */
    public const ENABLE = 'enable';

    /**
     * 通用状态 - 禁用.
     *
     * @Color("red")
     * @Text("禁用")
     */
    public const DISABLE = 'disable';
}
