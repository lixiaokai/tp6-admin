<?php
declare(strict_types=1);

namespace app\common\resource;

use think\Paginator;
use think\Response;

/**
 * 简单集合 - 基类.
 */
abstract class BaseCollection
{
    protected mixed $resource;

    public function toArray(): array
    {
        return $this->resource->toArray();
    }

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public static function make(Paginator $collection): Response
    {
        $res = [
            'code' => 10200,
            'message' => '',
            'data' => $collection->map(fn($resource) => (new static($resource))->toArray()),
        ];

        return Response::create($res, 'json')->contentType('application/json');
    }
}
