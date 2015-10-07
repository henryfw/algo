<?php

function reverseBits($n) {

    $ans = 0;
    $shift = log($n, 2);

    while ($n > 0) {

        $bit = $n & 1;

        $ans = $ans | $bit << $shift -- ;

        $n >>= 1;
    }

    return $ans;
}

var_dump(decbin(reverseBits(0b11001)) );