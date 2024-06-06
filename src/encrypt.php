<?php

require_once('./src/modExp.php');

function encrypt($publicKey, $message)
{
    $message = urlencode($message);
    [$n, $e] = $publicKey;
    $blockSize = floor(log($n, 2)) - 1;
    $blocks = array_reduce(str_split($message), function ($acc, $char) use ($blockSize) {
        $code = ord($char);
        $padded = str_pad($code, $blockSize, '0', STR_PAD_LEFT);
        $acc[] = $padded;
        return $acc;
    }, []);
    $encryptedBlocks = array_map(function ($block) use ($e, $n, $blockSize) {
        $num = (int)$block;
        return str_pad(modExp($num, $e, $n), $blockSize + 1, '0', STR_PAD_LEFT);
    }, $blocks);
    return implode('', $encryptedBlocks);
}
