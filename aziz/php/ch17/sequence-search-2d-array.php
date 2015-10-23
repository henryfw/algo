<?php


function match($A, $S) {
    $failedCached = [];
    $counter = 0;

    for($i = 0; $i < count($A); $i ++ ) {
        for($j = 0; $j < count($A[0]); $j ++) {
            if (helper($A, $S, $failedCached, $i, $j, 0, $counter)) {

                echo "\$counter $counter\n\n";

                return true;
            }
        }
    }

    echo "\$counter $counter\n\n";

    return false;
}


function helper($A, $S, &$failedCached, $i, $j, $len, &$counter) {

    if ($len == count($S)) {
        echo "  true: i: $i, j: $j\n";
        return true;
    }

    echo "checking i: $i, j: $j, len: $len, S: {$S[$len]}\n";

    if ($i < 0 || $i >= count($A) || $j < 0 || $j >= count($A[0]) || isset($failedCached["$i-$j-$len"])) {
        return false;
    }

    $counter ++;

    if ($A[$i][$j] == $S[$len] && (
        helper($A, $S, $failedCached, $i - 1, $j, $len + 1, $counter) ||
        helper($A, $S, $failedCached, $i + 1, $j, $len + 1, $counter) ||
        helper($A, $S, $failedCached, $i, $j - 1, $len + 1, $counter) ||
        helper($A, $S, $failedCached, $i, $j + 1, $len + 1, $counter) )) {
        return true;
    }

    $failedCached["$i-$j-$len"] = true;

    return false;
}


$inputs = [
    [1,2,3],
    [4,5,6],
    [5,6,7],
    [5,6,7],
    [5,6,7],
    [5,6,7],
    [5,6,7],
    [5,6,7],
    [5,6,7],
    [5,6,7],
];

var_dump(match($inputs, [1,2,3,6,5,6,6,5,6,7,6,5]));