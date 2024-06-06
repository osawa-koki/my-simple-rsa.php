<?php

function gcd($a, $b) {
    if ($a < 0 || $b < 0) {
        throw new Exception('引数は正の整数である必要があります。');
    }
    if (!is_int($a) || !is_int($b)) {
        throw new Exception('引数は正の整数である必要があります。');
    }

    if ($a == 0) {
        return $b;
    }
    if ($b == 0) {
        return $a;
    }

    return gcd($b, $a % $b);
}
