<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

require_once('./src/getPublicKey.php');

class GetPublicKeyTest extends TestCase
{
    public static function regulerCases()
    {
        return [
            [3, 5, [15, 65537]],
            [11, 17, [187, 65537]],
            [101, 103, [10403, 65537]],
            [631, 641, [404471, 65537]],
            [10007, 10009, [100160063, 65537]],
        ];
    }

    #[Test]
    #[DataProvider('regulerCases')]
    public function testReguler($p, $q, $expected)
    {
        $publicKey = getPublicKey($p, $q);
        $this->assertEquals($publicKey[0], $expected[0]);
        $this->assertEquals($publicKey[1], $expected[1]);
    }

    public static function exceptionCases()
    {
        return [
            [3, 3],
            [5, 5],
            [7, 7],
            [11, 11],
            [13, 13],
        ];
    }

    #[Test]
    #[DataProvider('exceptionCases')]
    public function testException($p, $q)
    {
        $this->expectException(Exception::class);
        getPublicKey($p, $q);
    }
}
