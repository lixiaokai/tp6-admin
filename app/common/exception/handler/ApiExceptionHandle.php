<?php
declare(strict_types=1);

namespace app\common\exception\handler;

use JetBrains\PhpStorm\ArrayShape;
use think\App;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;
use think\Request;
use think\Response;
use Throwable;

/**
 * API 应用 - 异常处理类.
 */
class ApiExceptionHandle extends Handle
{
    /**
     * HTTP 状态码.
     */
    protected int $statusCode = 200;

    /**
     * 状态码.
     */
    protected int $code = 10500;

    /**
     * 异常消息.
     */
    protected string $message = '未知错误';

    /**
     * 处理 - 异常.
     *
     * @param Request $request
     */
    public function render($request, Throwable $e): Response
    {
        $this->code = $e->getCode();
        $this->message = $e->getMessage();

        switch ($e) {
            case $e instanceof HttpException: // Http 异常
                $this->statusCode = (int) $e->getStatusCode();
                break;
            case $e instanceof ValidateException: // 验证器异常
                $this->message = $e->getError();
                break;
        }

        return Response::create($this->getData(), 'json', $this->statusCode);
    }

    #[ArrayShape(['code' => "int", 'message' => "string", 'data' => "null"])]
    public function getData(): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'data' => null,
        ];
    }
}
