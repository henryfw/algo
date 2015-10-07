<?php


function power($x, $y) {
    $result = 1;
    $power = $y;

    if ($y < 0) {
        $power = - $power ;
        $x = 1 / $x;
    }

    while ($power) {
        if ($power & 1) {
            $result *= $x;
        }
        $x *= $x;
        $power >>= 1;
        echo "x: $x, ans: $result, pow: $power\n";
    }

    return $result;
}



var_dump(power(5,5));