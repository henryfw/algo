<?php


function sortDutchFlag(&$inputs, $pivot) {

    $low = 0;
    $mid = 0;
    $high = count($inputs) - 1;

    while ($mid <= $high) {
        if ($inputs[$mid] < $pivot) {
            swap($inputs, $mid, $low);
            $low ++;
            $mid ++;
        }
        else if ($inputs[$mid] == $pivot) {
            $mid ++;
        }
        else {
            swap($inputs, $mid, $high);
            $high --;
        }
    }
}


function swap(&$inputs, $a, $b) {
    $tmp = $inputs[$a];
    $inputs[$a] = $inputs[$b];
    $inputs[$b] = $tmp;
}

$inputs = [11,9,8,7,56,4,3,23,5,6,7,8,9,11];
sortDutchFlag($inputs, 8);
print_r($inputs);