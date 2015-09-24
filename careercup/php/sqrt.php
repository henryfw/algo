<?php

function squareroot($num)
{
    $e = 0.00001;

    $candidate = $num / 2;
    do {
        $candidate = ($candidate + $num / $candidate) / 2;
        echo "$candidate \n";
    } while ($candidate * $candidate - $num > $e);

    return floor($candidate / $e) * $e;

}
//
//
//echo squareroot(49) . "\n";
//echo squareroot(25) . "\n";
//echo squareroot(9) . "\n";
//echo squareroot(81) . "\n";
echo squareroot(144) . "\n";