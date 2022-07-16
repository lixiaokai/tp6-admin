<?php
declare (strict_types = 1);

namespace app\common\controller;

use think\App;
use think\exception\ValidateException;
use think\Request;
use think\Response;
use think\Validate;

/**
 * 控制器 - 基类.
 */
abstract class BaseController
{
    /**
     * Request 实例.
     */
    protected Request $request;

    /**
     * 应用实例.
     */
    protected App $app;

    /**
     * 是否批量验证.
     */
    protected bool $batchValidate = false;

    /**
     * 控制器中间件.
     */
    protected array $middleware = [];

    /**
     * 构造方法.
     */
    public function __construct(App $app)
    {
        $this->app     = $app;
        $this->request = $this->app->request;

        // 控制器初始化
        $this->initialize();
    }

    /**
     * 初始化.
     */
    protected function initialize(): void
    {}

    /**
     * 验证数据.
     *
     * @param  array        $data     数据
     * @param  string|array $validate 验证器名或者验证规则数组
     * @param  array        $message  提示信息
     * @param  bool         $batch    是否批量验证
     * @throws ValidateException
     */
    protected function validate(array $data, string|array $validate, array $message = [], bool $batch = false): bool
    {
        if (is_array($validate)) {
            $v = new Validate();
            $v->rule($validate);
        } else {
            if (strpos($validate, '.')) {
                // 支持场景
                [$validate, $scene] = explode('.', $validate);
            }
            $class = str_contains($validate, '\\') ? $validate : $this->app->parseClass('validate', $validate);
            $v     = new $class();
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        $v->message($message);

        // 是否批量验证
        if ($batch || $this->batchValidate) {
            $v->batch();
        }

        return $v->failException()->check($data);
    }
}
