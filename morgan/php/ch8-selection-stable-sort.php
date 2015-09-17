<?php


function selectionStableSort(&$inputs) {
//    $l = count($inputs);
//    for ($i = 0; $i < $l; $i ++) {
//        $smallestIndex = null;
//        for ($j = $i; $j < $l; $j ++) {
//            if ($smallestIndex === null || $inputs[$j] < $inputs[$smallestIndex]) {
//                $smallestIndex = $j;
//            }
//        }
//        swap($inputs, $smallestIndex, $i);
//    }
}

function swap(&$inputs, $a, $b) {
    $tmp = $inputs[$a];
    $inputs[$a] = $inputs[$b];
    $inputs[$b] = $tmp;
}


$inputs = [10,5,2,1,99];

selectionStableSort($inputs);

print_r($inputs);