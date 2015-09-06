<?php


function mergeSort($input) {
    if (count($input) <= 1) return $input;

    $mid = (int) (count($input)/2);

    $leftData = mergeSort( array_slice($input, 0, $mid) );
    $rightData = mergeSort( array_slice($input, $mid ) );

    return merge($leftData, $rightData);
}


function merge($left, $right) {

    $leftIndex = $rightIndex = 0;
    $leftCount = count($left);
    $rightCount = count($right);
    $ans = [];
    while($leftIndex < $leftCount && $rightIndex < $rightCount) {
        if ($left[$leftIndex] <= $right[$rightIndex]) {
            $ans[] = $left[$leftIndex];
            $leftIndex ++;
        }
        else {
            $ans[] = $right[$rightIndex];
            $rightIndex ++;
        }
    }

    while($leftIndex < $leftCount) {
        $ans[] = $left[$leftIndex];
        $leftIndex ++;
    }
    while($rightIndex < $rightCount) {
        $ans[] = $right[$rightIndex];
        $rightIndex ++;
    }

    return $ans;
}


$inputs = [11,2,3,45,6,78,999];
print_r(mergeSort($inputs));