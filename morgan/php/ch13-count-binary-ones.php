<?php

function countOnes($n) {
    if ($n < 1) $n *=  -1;
    $count = 0;

    while($n > 0) {
        if ($n & 0b1) {
            $count ++;
        }
        $n = $n >> 1;
    }
    return $count;
}



echo countOnes(-3);