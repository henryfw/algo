<?php

function quickSort(&$inputs, $left = 0, $right = -1) {
    if ($right == -1) $right = count($inputs) - 1;

    if ($left >= $right) return;

    $start = $left;
    $stop = $right;

    $pivot = $inputs[$right];

    while ($left <= $right) {

        while($inputs[$left] < $pivot) {
            $left ++;
        }

        while($inputs[$right] > $pivot) {
            $right --;
        }

        if ($left <= $right) {
            $tmp = $inputs[$right];
            $inputs[$right] = $inputs[$left];
            $inputs[$left] = $tmp;
            $left ++;
            $right --;
        }
    }

    quickSort($input, $start, $right);
    quickSort($inputs, $left, $stop);


}


$inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];


quickSort($inputs);

print_r($inputs);




