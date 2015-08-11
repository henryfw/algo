<?php

function insertion_sort(&$inputs) {
    for ($i = 1; $i < count($inputs); $i ++) {
        $to_insert_value = $inputs[$i];
        $to_swap_index = $i;
        for ($j = $i - 1; $j >= 0; $j --) {
            if ($inputs[$j] > $to_insert_value) {
                $inputs[$j + 1] = $inputs[$j];
                $to_swap_index = $j;
            }
            else {
                break;
            }
        }
        $inputs[$to_swap_index] = $to_insert_value;
    }
}


function insertion_sort_2(&$inputs) {
    for ($i = 1; $i < count($inputs); $i ++) {
        $to_insert_value = $inputs[$i];
        $j = $i;
        while($j > 0 && $inputs[$j - 1] > $to_insert_value) {
            $inputs[$j] = $inputs[$j - 1];
            $j --;
        }
        $inputs[$j] = $to_insert_value;
    }
}

$inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];


insertion_sort($inputs);

print_r($inputs);

insertion_sort_2($inputs);

print_r($inputs);