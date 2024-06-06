<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

require_once('./src/modExp.php');

class ModExpTest extends TestCase
{
    public static function regulerCases()
    {
        return [
            [2, 5, 13, 6],
            [3, 7, 13, 3],
            [5, 11, 13, 8],
            [7, 13, 13, 7],
            [11, 17, 13, 7],
            [13, 19, 13, 0],
            [17, 23, 13, 10],
            [19, 29, 13, 2],
            [23, 31, 13, 10],
            [29, 37, 13, 3],
        ];
    }

    #[Test]
    #[DataProvider('regulerCases')]
    public function testReguler($a, $b, $m, $expected)
    {
        $this->assertEquals(modExp($a, $b, $m), $expected);
    }
}
