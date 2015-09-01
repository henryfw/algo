<?php


function bitSwapRequired($a, $b) {

    $count = 0;
    $c = $a ^ $b;
    while ($c != 0) {
        $count += $c & 1;
        $c = $c >> 1;
    }

    return $count;
}


echo bitSwapRequired(0b1001, 0b1110);