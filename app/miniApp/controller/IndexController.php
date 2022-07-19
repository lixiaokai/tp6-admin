<?php
declare (strict_types = 1);

namespace app\miniApp\controller;

use app\common\controller\JsonController;

class IndexController extends JsonController
{
    public function index(): string
    {
        return '您好！这是一个[miniApp]示例应用';
    }
}
