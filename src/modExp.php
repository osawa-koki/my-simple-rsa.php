<?php

function modExp($a, $b, $m)
{
    $result = 1;
    $a = $a % $m;
    while ($b > 0) {
        if ($b % 2 == 1) {
            $result = ($result * $a) % $m;
        }
        $b = $b >> 1;
        $a = ($a * $a) % $m;
    }
    return $result;
}
