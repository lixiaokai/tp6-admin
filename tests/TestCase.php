<?php
declare(strict_types=1);

namespace tests;

/**
 * 单元测试 - 抽象类.
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * 测试之前 - 执行.
     */
    protected function setUp(): void
    {

    }

    /**
     * 测试之后 - 执行.
     */
    public function tearDown(): void
    {

    }
}

