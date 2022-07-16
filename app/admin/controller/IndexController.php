<?php
declare(strict_types=1);

namespace app\admin\controller;

use app\common\controller\JsonController;

/**
 * Home - 控制器.
 */
class IndexController extends JsonController
{
    public function index(): string
    {
        return '您好！这是一个 [ admin ] 示例应用';
    }
}
