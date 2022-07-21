<?php
declare(strict_types=1);

namespace app\common\request;

/**
 * 请求类.
 */
class Request extends \think\Request
{
    /**
     * 变量过滤.
     *
     * 只格式化 & ’ “ < > 这 5 个特殊符号.
     * 框架默认没有设置任何请求过滤规则，可在这里定义.
     */
    protected $filter = ['htmlspecialchars'];
}
