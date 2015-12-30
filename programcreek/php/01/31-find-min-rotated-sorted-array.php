<?php

function findMin($inputs) {

    return helper($inputs, 0, count($inputs) - 1);


}


function helper($inputs, $left, $right) {
    if ($left == $right) return $inputs[$left];


    if ($right == $left + 1) {
        return min($inputs[$left], $inputs[$right]);
    }


    $middle = floor( ($right - $left)/2 ) + $left;

    // already sorted
    if ($inputs[$right] > $inputs[$left]) return $inputs[$left];

    //right shift one
    else if ($inputs[$right] == $inputs[$left]) return helper($inputs, $left + 1, $right);

    //go right
    else if ($inputs[$middle] >= $inputs[$left]) return helper($inputs, $middle, $right);

    //go left
    else return helper($inputs, $left, $middle);
}