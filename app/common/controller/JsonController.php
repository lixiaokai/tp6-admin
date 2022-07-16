<?php
declare (strict_types = 1);

namespace app\common\controller;

use think\App;
use think\Response;

/**
 * 控制器 - 基类.
 */
abstract class JsonController extends BaseController
{
    /**
     * 操作成功 - 快捷方法.
     */
    protected function success(mixed $data = null, $message = '操作成功'): Response
    {
        $res = [
            'code' => 10200,
            'message' => $message,
            'data' => $data,
        ];

        return Response::create($res, 'json')->contentType('application/json');
    }
}
