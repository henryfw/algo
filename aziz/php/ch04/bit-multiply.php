<?php

function multiply($x, $y) {
    $sum = 0;

    while($x) {
        echo "x $x, y $y \n";
        if ($x & 1) {
            echo " adding to $sum $y\n";
            $sum = add($sum, $y);
        }
        $x >>= 1;
        $y <<= 1;
     }

    return $sum;
}


function add($a, $b) {
    $sum = 0;
    $carryIn = 0;
    $k = 1;
    $tmpA = $a;
    $tmpB = $b;

    while ($tmpA || $tmpB) {
        $ak = $a & $k;
        $bk = $b & $k;

        $carryOut = ($ak & $bk) | ($ak & $carryIn) | ($bk & $carryIn);
        $sum |= ($ak ^ $bk ^ $carryIn);
        $carryIn = $carryOut << 1;
        $k <<= 1;
        $tmpA >>= 1;
        $tmpB >>= 1;
    }

    return $sum | $carryIn;
}


//var_dump(add(5,11);
var_dump(multiply(5,11));
