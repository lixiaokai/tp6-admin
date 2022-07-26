<?php
namespace tests;

/**
 * 单元测试 - 范例.
 */
class ExampleTest extends TestCase
{
    /**
     * 测试 - 数据类型.
     */
    public function testDataType()
    {
        $this->assertTrue(true); // 断言为真
        $this->assertFalse(false); // 断言为假
        $this->assertIsBool(false); // 断言为布尔数

        $this->assertIsInt(0); // 断言为纯数字

        $this->assertIsFloat(0.0); // 断言为浮点数

        $this->assertIsArray([]); // 断言为闭包

        $this->assertIsCallable(function() {}); // 断言为闭包
    }

    /**
     * 测试 - 相等性.
     */
    public function testEqual()
    {
        $this->assertEquals(0, 0); // 断言为相等
    }

    /**
     * 测试 - 字符串包含关系.
     */
    public function testStringContainsString()
    {
        // 断言包含字符串
        $this->assertStringContainsString("测试", '这串文字是否包含测试 2 字');
    }

    /**
     * 测试 - 数组中是否存在 key,
     */
    public function testArrayHasKey()
    {
        // 断言数组中存在 key
        $this->assertArrayHasKey('key', ['key' => 'value']);
    }
}
