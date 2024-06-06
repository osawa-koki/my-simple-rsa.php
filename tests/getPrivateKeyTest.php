<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

require_once('./src/getPrivateKey.php');

class GetPrivateKeyTest extends TestCase
{
    public static function regulerCases()
    {
        return [
            [3, 5, [15, 65537], [15, 1]],
            [61, 53, [3233, 17], [3233, 413]],
            [71, 61, [4979, 19], [4979, 199]],
        ];
    }

    #[Test]
    #[DataProvider('regulerCases')]
    public function testReguler($p, $q, $publicKey, $expected)
    {
        $privateKey = getPrivateKey($p, $q, $publicKey);
        $this->assertEquals($privateKey[0], $expected[0]);
        $this->assertEquals($privateKey[1], $expected[1]);
    }
}
