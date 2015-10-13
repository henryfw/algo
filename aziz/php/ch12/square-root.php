<?php

function squareRoot($n) {
    $left = 0;
    $right = $n;

    while ($left <= $right) {
        $mid = $left + floor(($right - $left) /2 );
        $midSquared = $mid * $mid;
        if ($midSquared <= $n) {
            $left = $mid + 1;
        }
        else {
            $right = $mid - 1;
        }
    }

    return $left - 1;
}


echo squareRoot(80) . "\n";
echo squareRoot(81) . "\n";
echo squareRoot(82) . "\n";