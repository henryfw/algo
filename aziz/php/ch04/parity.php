<?php

function parity($x) {

    $result = 0;
    while($x) {
        $result ^= 1;
        $x &= ($x - 1);
    }
    return $result;
}


var_dump(parity(115));
var_dump(parity(116));