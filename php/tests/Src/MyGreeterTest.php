<?php

use PHPUnit\Framework\TestCase;
use Src\MyGreeter;

class MyGreeterTest extends TestCase
{
    private MyGreeter $greeter;

    public function setUp(): void
    {
        $this->greeter = new MyGreeter();
    }

    public function test_init()
    {
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }

    public function test_greeting()
    {
        $this->assertTrue(
            strlen($this->greeter->greeting()) > 0
        );
        # 王少强：此处按照正常逻辑判断当前时间应该返回的greeting字符串
        # 当前时间的小时数0-23
        $h = date("H");


        if ($h >= 6 && $h < 12) {
            # 当运行时间在6AM至12AM之间时，返回 "Good morning"。
            $this->assertTrue(
                $this->greeter->greeting() == 'Good morning'
            );
        }
        else if ($h >= 12 && $h < 18) {
            # 当运行时间在12AM至6PM之间时，返回 "Good afternoon"。
            $this->assertTrue(
                $this->greeter->greeting() == 'Good afternoon'
            );
        }
        else {
            # 当运行时间在6PM至第二天6AM之间时，返回 "Good evening"。
            $this->assertTrue(
                $this->greeter->greeting() == 'Good evening'
            );
        }
    }

    # 王少强：由于不太方便直接修改系统时间来进行test，所以我新增了greetingByHour，根据当前hour来返回greeting字符串，此处为test方法
    public function test_greeting_by_hour()
    {
        $this->assertTrue(
            $this->greeter->greetingByHour(6) == 'Good morning'
            && $this->greeter->greetingByHour(11) == 'Good morning'
        );
        $this->assertTrue(
            $this->greeter->greetingByHour(12) == 'Good afternoon'
            && $this->greeter->greetingByHour(17) == 'Good afternoon'
        );
        $this->assertTrue(
            $this->greeter->greetingByHour(18) == 'Good evening'
            && $this->greeter->greetingByHour(23) == 'Good evening'
            && $this->greeter->greetingByHour(0) == 'Good evening'
            && $this->greeter->greetingByHour(5) == 'Good evening'
        );
        $this->assertTrue(
            $this->greeter->greetingByHour(24) == ''
        );

    }
}
