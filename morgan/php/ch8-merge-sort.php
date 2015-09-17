<?php

function mergeSort($inputs) {
    $l = count($inputs);

    if ($l <= 1) return $inputs;

    $midIndex = floor($l/2);

    $left = mergeSort(array_slice($inputs, 0, $midIndex));
    $right = mergeSort(array_slice($inputs, $midIndex));

    return merge($left, $right);
}

function merge($left, $right) {
    $ans = [];

    $leftLength = count($left) ;
    $rightLength = count($right) ;

    $leftIndex = 0;
    $rightIndex = 0;

    while($leftIndex < $leftLength && $rightIndex < $rightLength) {
        if ($left[$leftIndex] < $right[$rightIndex]) {
            $ans[] = $left[$leftIndex];
            $leftIndex ++;
        }
        else {
            $ans[] = $right[$rightIndex];
            $rightIndex ++;
        }
    }

    while($leftIndex < $leftLength) {
        $ans[] = $left[$leftIndex];
        $leftIndex ++;
    }

    while($rightIndex < $rightLength) {
        $ans[] = $right[$rightIndex];
        $rightIndex ++;
    }

    return $ans;

}

$inputs = [10,5,2,1,99];

$ans = mergeSort($inputs);

print_r($ans);