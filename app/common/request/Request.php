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
     * 框架默认没有设置任何全局过滤规则，这里手动设置
     */
    protected $filter = ['htmlspecialchars'];
}
