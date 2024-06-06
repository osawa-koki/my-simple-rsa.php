<?php

require_once('./src/gcd.php');

function getPublicKey($p, $q)
{
    $n = $p * $q;
    $phi = ($p - 1) * ($q - 1);
    $e = 65537;

    if ($p == $q) {
        throw new Exception("pとqは同じ値にすることはできません。");
    }

    while (gcd($e, $phi) != 1) {
        $e += 1;
    }

    return [$n, $e];
}
