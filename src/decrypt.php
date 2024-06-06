<?php

require_once('./src/modExp.php');

function decrypt($privateKey, $encrypted)
{
    $n = $privateKey[0];
    $GLOBALS['n'] = $n;
    $d = $privateKey[1];
    $GLOBALS['d'] = $d;
    $blockSize = floor(log($n, 2)) - 1;
    $encryptedBlocks = array_reduce(str_split($encrypted, $blockSize + 1), function ($acc, $block) {

        $num = (int)$block;
        $acc[] = modExp($num, $GLOBALS['d'], $GLOBALS['n']);
        return $acc;
    }, []);
    $decryptedString = implode('', array_map('chr', $encryptedBlocks));
    return urldecode($decryptedString);
}
