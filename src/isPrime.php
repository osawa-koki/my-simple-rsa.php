<?php

function isPrime($num)
{
    if (is_int($num) === false) {
        throw new InvalidArgumentException('Argument must be an integer');
    }
    if ($num < 0) {
        throw new InvalidArgumentException('Argument must be a positive integer');
    }

    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}
