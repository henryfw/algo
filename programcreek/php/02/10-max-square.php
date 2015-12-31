<?php

function maxSquare($inputs) {
    $m = count($inputs);
    $n = count($inputs[0]);

    $t = [];

    // top
    for ($i = 0; $i < $m; $i ++) {
        $t[$i][0] = $inputs[$i][0];
    }

    // left
    for ($j = 0; $j < $n; $j ++) {
        $t[0][$j] = $inputs[0][$j];
    }

    // rest
    for ($i = 1; $i < $m; $i ++ ) {
        for ($j = 1; $j < $n; $j ++ ) {
            if ($inputs[$i][$j] == 1) {
                $min = min($t[$i - 1][$j], $t[$i - 1][$j - 1]);
                $min = min($min, $t[$i][$j - 1]);
                $t[$i][$j] = $min + 1;
            }
            else {
                $t[$i][$j] = 0;
            }
        }
    }

    $max = 0;

    foreach($t AS $row) {
        echo implode(" ", $row) . "\n";
    }

    for ($i = 0; $i < $m; $i ++ ) {
        for ($j = 0; $j < $n; $j ++ ) {
            if ($t[$i][$j] > $max) {
                $max = $t[$i][$j];
            }
        }
    }

    return $max * $max;
}


$inputs = "1101
1101
1111";

$inputs = explode("\n", $inputs);
foreach($inputs AS $k => $v) {
    $inputs[$k] = str_split($v);
}

echo maxSquare($inputs);