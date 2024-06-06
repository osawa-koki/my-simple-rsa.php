<?php

require_once './src/getPrivateKey.php';
require_once './src/getPublicKey.php';
require_once './src/encrypt.php';
require_once './src/decrypt.php';
require_once './src/isPrime.php';

foreach ($GLOBALS['argv'] as $arg) {
    if (preg_match('/^p1=(.*)$/', $arg, $matches)) {
        $GLOBALS['params']['p1'] = $matches[1];
    }
    if (preg_match('/^p2=(.*)$/', $arg, $matches)) {
        $GLOBALS['params']['p2'] = $matches[1];
    }
    if (preg_match('/^m=(.*)$/', $arg, $matches)) {
        $GLOBALS['params']['m'] = $matches[1];
    }
}

[$p1, $p2, $m] = [$GLOBALS['params']['p1'], $GLOBALS['params']['p2'], $GLOBALS['params']['m']];
echo "p1: $p1, p2: $p2, m: $m\n";

if ($p1 == null || $p2 == null || $m == null) {
    echo "Usage: php main.php p1=XXX p2=XXX m=XXX\n";
    exit(1);
}

if (!isPrime((int)$p1) || !isPrime((int)$p2)) {
    echo "Error: p1 and p2 must be prime numbers\n";
    exit(1);
}

$publicKey = getPublicKey($p1, $p2);
$privateKey = getPrivateKey($p1, $p2, $publicKey);

echo "public key: ({$publicKey[0]}, {$publicKey[1]})\n";
echo "private key: ({$privateKey[0]}, {$privateKey[1]})\n";

$encrypted = encrypt($publicKey, $m);
$decrypted = decrypt($privateKey, $encrypted);

if ($m != $decrypted) {
    echo "Error: $m != $decrypted\n";
    exit(1);
}

echo "encrypted: $encrypted\n";
echo "decrypted: $decrypted\n";
