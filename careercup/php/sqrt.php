<?php

function squareroot($num)
{
    $e = 0.00001;

    // c = n / 2
    $candidate = $num / 2;
    do {
        // c = ( c + n/c ) / 2
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

/*
37
20.445945945946
13.744453475286
12.110703489699
12.000505968239
12.000000010666
12*/