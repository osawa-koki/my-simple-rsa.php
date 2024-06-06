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
            // { inputs: [2, 3], expected_output: 6 },
            // { inputs: [10, 25], expected_output: 50 },
            // { inputs: [14, 21], expected_output: 42 },
            // { inputs: [15, 18], expected_output: 90 },
            // { inputs: [35, 49], expected_output: 245 },
            // { inputs: [100, 125], expected_output: 500 },
            // { inputs: [72, 96], expected_output: 288 },
            // { inputs: [168, 216], expected_output: 1512 },
            // { inputs: [111, 123], expected_output: 4551 },
            // { inputs: [222, 123], expected_output: 9102 },
            // { inputs: [0, 0], expected_output: 0 },
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
