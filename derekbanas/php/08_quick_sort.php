<?php

function quick_sort(&$inputs) {
    quick_sort_body($inputs, 0, count($inputs) - 1);
}


function quick_sort_body(&$inputs, $left, $right) {
    $start = $left;
    $end = $right;

    if ($left < $right) {
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

        quick_sort_body($inputs, $start, $right);
        quick_sort_body($inputs, $left, $end);
    }
}




$inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];


quick_sort($inputs);

print_r($inputs);
