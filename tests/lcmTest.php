<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

require_once('./src/lcm.php');

class LcmTest extends TestCase
{
    public static function regulerCases()
    {
        return [
            [2, 3, 6],
            [10, 25, 50],
            [14, 21, 42],
            [15, 18, 90],
            [35, 49, 245],
            [100, 125, 500],
            [72, 96, 288],
            [168, 216, 1512],
            [111, 123, 4551],
            [222, 123, 9102],
            [0, 0, 0],
        ];
    }

    #[Test]
    #[DataProvider('regulerCases')]
    public function testReguler($a, $b, $expected)
    {
        $this->assertEquals(lcm($a, $b), $expected);
    }

    public static function exceptionCases()
    {
        return [
            [2.5, 3],
            [2, 3.5],
            [-2, 3],
            [2, -3],
        ];
    }

    #[Test]
    #[DataProvider('exceptionCases')]
    public function testException($a, $b)
    {
        $this->expectException(Exception::class);
        lcm($a, $b);
    }
}
