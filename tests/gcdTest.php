<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

require_once('./src/gcd.php');

class GcdTest extends TestCase
{
    public static function regulerCases()
    {
        return [
            [2, 3, 1],
            [10, 25, 5],
            [14, 21, 7],
            [15, 18, 3],
            [35, 49, 7],
            [100, 125, 25],
            [72, 96, 24],
            [168, 216, 24],
            [111, 123, 3],
            [222, 123, 3],
            [0, 0, 0],
        ];
    }

    #[Test]
    #[DataProvider('regulerCases')]
    public function testReguler($a, $b, $expected)
    {
        $this->assertEquals(gcd($a, $b), $expected);
    }

    public static function exceptionCases()
    {
        return [
            [-1, 3],
            [1, -3],
            [1.5, 3],
            [1, 3.5]
        ];
    }

    #[Test]
    #[DataProvider('exceptionCases')]
    public function testException($a, $b)
    {
        $this->expectException(Exception::class);
        gcd($a, $b);
    }
}
