<?php

function longPrecisionMultiply(array $a, array $b) {
    $neg = ($a[0] < 0 && $b[0] >= 0) || ($a[0] >=0 && $b[0] < 0);

    $a[0] = abs($a[0]);
    $b[0] = abs($b[0]);

    $a = array_reverse($a);
    $b = array_reverse($b);

    $result = array_fill(0, count($a) + count($b) + 1, 0);

    for ($i = 0; $i < count($a); $i ++) {
        for ($j = 0; $j < count($b); $j ++) {
            $result[$i + $j] += $a[$i] * $b[$j];
            $result[$i + $j + 1] += floor( $result[$i + $j] / 10 );
            $result[$i + $j] %= 10;
        }
    }

    while (count($result) != 1 && end($result) == 0) {
        array_pop($result);
    }

    $result = array_reverse($result);

    if ($neg) $result[0] *= -1;

    return $result;
 }


print_r(longPrecisionMultiply([2,5], [1,0]));