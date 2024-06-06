<?php

require_once('./src/lcm.php');

function getPrivateKey($p, $q, $publicKey)
{
    [$n, $e] = $publicKey;
    $phi = lcm($p - 1, $q - 1);
    $d = modInv($e, $phi);

    if ($p == $q) {
        return null;
    }

    while ($d < 0) {
        $d += $phi;
    }
    return [$n, $d];
}


function modInv($a, $m)
{
    [$gcdVal, $x] = extEuclidean($a, $m);
    if ($gcdVal != 1) {
        throw new Exception("a = {$a}(mod {$m})における逆元が存在しません。");
    }
    return ($x % $m + $m) % $m;
}

function extEuclidean($a, $b)
{
    $x = 0;
    $y = 1;
    $u = 1;
    $v = 0;
    while ($a != 0) {
        $q = intdiv($b, $a);
        $r = $b % $a;
        $m = $x - $u * $q;
        $n = $y - $v * $q;
        $b = $a;
        $a = $r;
        $x = $u;
        $y = $v;
        $u = $m;
        $v = $n;
    }
    return [$b, $x, $y];
}
