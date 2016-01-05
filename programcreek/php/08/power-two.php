<?php


function isPowerOfTwo($n) {
    if ($n <= 0) return false;

    while ($n > 2) {
        $t = $n >> 1;
        $c = $t << 1;

        if ($n - $c != 0) return false;

        $n >>= 1;

    }
    return true;
}


var_dump(isPowerOfTwo(256));
var_dump(isPowerOfTwo(16));
var_dump(isPowerOfTwo(11));