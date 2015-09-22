<?php


function findSubSet($inputs, $m, $sum) {
    $length = count($inputs);
    if ($length < $m) return null;

    if ($m == 0) return [];

    sort($inputs);

    for( $i = 0; $i <= $length - $m; $i ++) {
        $subset = array_slice($inputs, $i, $m);
        $tmpSum = array_sum($subset);
        if ($tmpSum == $sum) {
            return $subset;
        }
        else if ($tmpSum > $sum) break;
    }

    return null;
}

var_dump(findSubSet([7,1,2,3,4,5,6,7,7,7], 4, 14));

