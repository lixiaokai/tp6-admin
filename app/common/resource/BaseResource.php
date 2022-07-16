<?php
declare(strict_types=1);

namespace app\common\resource;

use JetBrains\PhpStorm\ArrayShape;
use think\Response;

/**
 * 简单资源 - 基类.
 */
abstract class BaseResource
{
    public mixed $resource;

    public string $message = '';

    public function __construct(mixed $resource = null, string $message = '')
    {
        $this->resource = $resource;
        $this->message = $message;
    }

    /**
     * 输出 - 空数据.
     */
    public static function empty(): Response
    {
        return (new static())->toResponse();
    }

    /**
     * 输出 - 资源.
     */
    public static function make(...$parameters): Response
    {
        return (new static(...$parameters))->toResponse();
    }

    public function toArray(): array
    {
        if (is_null($this->resource)) {
            return [];
        }

        return is_array($this->resource)
            ? $this->resource
            : $this->resource->toArray();
    }

    public function toResponse(): Response
    {
        return Response::create($this->getData(), 'json')->contentType('application/json');
    }

    public function __isset($key)
    {
        return isset($this->resource->{$key});
    }

    public function __set(string $name, mixed $value)
    {
    }

    public function __get($key)
    {
        return $this->resource->{$key};
    }

    #[ArrayShape(['code' => "int", 'message' => "string", 'data' => "array"])]
    protected function getData(): array
    {
        return [
            'code' => 10200,
            'message' => $this->message,
            'data' => $this->toArray()
        ];
    }
}
