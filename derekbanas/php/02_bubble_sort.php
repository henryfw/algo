<?php

function swap(&$inputs, $i, $j){
    $tmp = $inputs[$i];
    $inputs[$i] = $inputs[$j];
    $inputs[$j] = $tmp;
}


function bubble_sort(&$inputs) {
    for ($i = count($inputs) - 1; $i >= 0; $i --) {
        for ($j = 0; $j < $i; $j ++ ) {
            if ($inputs[$j] > $inputs[$j + 1]) {
                swap($inputs, $j, $j + 1);
            }
        }
    }
}


$inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];


bubble_sort($inputs);

print_r($inputs);