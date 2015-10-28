<?php

function pickUpCoin($inputs) {
    $T = [];

    for ($i = 0; $i < count($inputs); $i ++ ) {
        $T[] = array_fill(0, count($inputs), -1);
    }

    return helper($inputs, 0, count($inputs) - 1, $T);
}


function helper($inputs, $a, $b, &$T) {
    if ($a > $b) return 0; // base

    if ($T[$a][$b] == -1) {
        $T[$a][$b] = max($inputs[$a] +
            min(helper($inputs, $a + 2, $b, $T),
                helper($inputs, $a + 1, $b - 1, $T)) ,
            $inputs[$b] + min(helper($inputs, $a + 1, $b - 1, $T),
                helper($inputs, $a, $b - 2, $T))
        );
    }
    return $T[$a][$b];
}
