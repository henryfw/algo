<?php

function divide($x, $y) {
    $result = 0;

    $power = 32;

    $yPower = $y << $power;

    while ($x >= $y) {
        while ($yPower > $x) {
            $yPower >>= 1;
            -- $power;
        }
        $result += 1 << $power;
        $x -= $yPower;
    }

    return $result;
}


var_dump(divide(9, 3));
var_dump(divide(99, 5));