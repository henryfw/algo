<?php

function quickSort(&$inputs) {
    return doQuickSort($inputs, 0, count($inputs) - 1);
}

function doQuickSort(&$inputs, $start, $end) {
    if ($start >= $end) return;

    $pivot = $inputs[$end];

    $left = $start;
    $right = $end;

    while ($left <= $right) {
        if ($inputs[$left] < $pivot) {
            $left ++;
        }
        else if ($inputs[$right] > $pivot) {
            $right --;
        }
        else {
            swap($inputs, $left, $right);
            $left ++;
            $right --;
        }
    }

    doQuickSort($inputs, $left, $end);
    doQuickSort($inputs, $start, $right);
}



function swap(&$inputs, $a, $b) {
    $tmp = $inputs[$a];
    $inputs[$a] = $inputs[$b];
    $inputs[$b] = $tmp;
}


$inputs = [10,5,2,1,99];

quickSort($inputs);

print_r($inputs);