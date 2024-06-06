<?php

use PHPUnit\Framework\TestCase;

require_once('./src/gcd.php');

class GcdTest extends TestCase
{
    public function testGcd()
    {
        $testCases = [
            ['inputs' => [2, 3], 'expected_output' => 1],
            ['inputs' => [10, 25], 'expected_output' => 5],
            ['inputs' => [14, 21], 'expected_output' => 7],
            ['inputs' => [15, 18], 'expected_output' => 3],
            ['inputs' => [35, 49], 'expected_output' => 7],
            ['inputs' => [100, 125], 'expected_output' => 25],
            ['inputs' => [72, 96], 'expected_output' => 24],
            ['inputs' => [168, 216], 'expected_output' => 24],
            ['inputs' => [111, 123], 'expected_output' => 3],
            ['inputs' => [222, 123], 'expected_output' => 3],
            ['inputs' => [0, 0], 'expected_output' => 0],
        ];

        foreach ($testCases as $testCase) {
            $inputs = $testCase['inputs'];
            $expectedOutput = $testCase['expected_output'];

            $this->assertEquals(gcd($inputs[0], $inputs[1]), $expectedOutput);
            $this->assertEquals(gcd($inputs[1], $inputs[0]), $expectedOutput);
        }
    }
}
