<?php
declare(strict_types=1);

namespace tests\admin\job;

use app\admin\job\SendSmsJob;
use PHPUnit\Framework\TestCase;
use think\facade\Queue;

class SendSmsJobTest extends TestCase
{
    public function testFire()
    {
        Queue::push(SendSmsJob::class, ['a' => 'aa'], 'sendSmsJob');
    }
}
