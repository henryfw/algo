<?php

function swap(&$input, $i, $j){
    $tmp = $input[$i];
    $input[$i] = $input[$j];
    $input[$j] = $tmp;
}


function bubble_sort(&$input) {
    for ($i = count($input) - 1; $i >= 0; $i --) {
        for ($j = 0; $j < $i; $j ++ ) {
            if ($input[$j] > $input[$j + 1]) {
                swap($input, $j, $j + 1);
            }
        }
    }
}


$input = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];


bubble_sort($input);

print_r($input);