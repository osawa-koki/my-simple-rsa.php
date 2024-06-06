<?php

function lcm($num1, $num2)
{
    if (is_int($num1) === false || is_int($num2) === false) {
        throw new InvalidArgumentException('Argument must be an integer');
    }
    if ($num1 < 0 || $num2 < 0) {
        throw new InvalidArgumentException('Argument must be a positive integer');
    }

    if ($num1 === 0 || $num2 === 0) {
        return 0;
    }

    return abs($num1 * $num2) / gcd($num1, $num2);
}
