<?php

function squareRootReal($x) {

    if ($x < 1) {
        $left = $x;
        $right = 1;
    }
    else { // x > 1
        $left = 1;
        $right = $x;
    }

    while ( compare($left, $right) == -1 ) {
        $mid = $left + 0.5 * ($right - $left);
        $midSquared = $mid * $mid;
        if (compare($midSquared, $x) == 0) {
            return $mid;
        }
        else if (compare($midSquared, $x) == 1) {
            $right = $mid;
        }
        else {
            $left = $mid;
        }
    }
    return $left;
}

function compare($a, $b, $epsilon = .00001) {
    $diff = ($a - $b) /$b;
    if ($diff < - $epsilon) {
        return -1;
    }
    if ($diff > $epsilon) {
        return 1;
    }
    return 0;
}


echo squareRootReal(144) . "\n";

// careercup's method is way better
/*
72.5
36.75
18.875
9.9375
14.40625
12.171875
11.0546875
11.61328125
11.892578125
12.0322265625
11.96240234375
11.997314453125
12.014770507812
12.006042480469
12.001678466797
11.999496459961
12.000587463379
12.00004196167
 */