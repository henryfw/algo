<?php

function swap(&$inputs, $i, $j){
    $tmp = $inputs[$i];
    $inputs[$i] = $inputs[$j];
    $inputs[$j] = $tmp;
}


function selection_sort(&$inputs) {
    for ($i = 0; $i < count($inputs); $i ++) {
        $smallest = $i;
        for ($j = $i; $j < count($inputs); $j ++) {
            if ($inputs[$j] < $inputs[$smallest]) {
                $smallest = $j;
            }
        }
        swap($inputs, $smallest, $i);
    }

}


$inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];


selection_sort($inputs);

print_r($inputs);