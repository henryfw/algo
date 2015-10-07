<?php

function swapBits($x, $i, $j) {
    if ((($x >> $i) & 1) != (($x >> $j) & 1)) {
        $mask = (1 << $i) | (1 << $j);
        $x ^= $mask;
    }
    return $x;
}

echo decbin(swapBits(0b11001, 0, 1));