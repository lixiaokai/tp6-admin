<?php
declare (strict_types = 1);

namespace app\index\controller;

use app\common\controller\BaseController;

class IndexController extends BaseController
{
    public function index(): string
    {
        return '您好！这是一个 [ index ] 示例应用';
    }
}
