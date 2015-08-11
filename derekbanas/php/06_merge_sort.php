<?php


# sorts in place
function merge_sort(&$inputs) {
    if (count($inputs) <= 1) {
        return $inputs;
    }

    $left = array();
    $right = array();
    $mid = (int) ( count($inputs)/2 );

    for ($i = 0; $i < $mid; $i ++) {
        $left[] = $inputs[$i];
    }

    for ($i = $mid; $i < count($inputs); $i ++) {
        $right[] = $inputs[$i];
    }

    merge_sort($left);
    merge_sort($right);

    $inputs = merge($left, $right);
}


function merge($left, $right) {
    $result = array();

    $left_index = 0;
    $right_index = 0;

    $left_len = count($left);
    $right_len = count($right);

    while ($left_index < $left_len && $right_index < $right_len) {
        if ($left[$left_index] <= $right[$right_index]) {
            $result[] = $left[$left_index];
            $left_index ++;
        }
        else {
            $result[] = $right[$right_index];
            $right_index ++;
        }
    }

    while ($left_index < $left_len) {
        $result[] = $left[$left_index];
        $left_index ++;
    }

    while ($right_index < $right_len) {
        $result[] = $right[$right_index];
        $right_index ++;
    }

    return $result;
}


$inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];


merge_sort($inputs);

print_r($inputs);
