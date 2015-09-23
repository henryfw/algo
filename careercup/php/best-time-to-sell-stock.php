<?php


// http://www.careercup.com/question?id=6051351341563904


function maxDiff($inputs) {
    $min = PHP_INT_MAX;
    $diff = 0;

    foreach($inputs AS $i) {
        $min = min($min, $i);
        $diff = max($diff, $i - $min);
    }

    return $diff;
}


print_r(maxDiff([1,3,4,5,6,7,8,9,11,20]));