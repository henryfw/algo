<?php

function binarySearch($inputs, $target, $left = 0, $right = null) {
    if ($right === null) $right = count($inputs) - 1;


    if ($left > $right) return -1;


    $mid = (int) (($left + $right)/2);

    if ($inputs[$mid] == $target) return $mid;

    else if ($target < $inputs[$mid]) {
        return binarySearch($inputs, $target, $left, $mid - 1);
    }
    else {
        return binarySearch($inputs, $target, $mid + 1, $right);
    }
    
}



echo binarySearch([2,3,4,55,69,88,888,1000,1001], 88);