<?php

// for array with distinct elements
function magicFast($inputs, $start, $end) {
    if ($start > $end || $start < 0 || $end >= count($inputs)) {
        return -1;
    }
    $mid = (int) (($start + $end) / 2);
    if ($inputs[$mid] == $mid) {
        return $mid;
    }
    else if ($inputs[$mid] > $mid) {
        // go left
        return magicFast($inputs, $start, $mid - 1);
    }
    else {
        // go right
        return magicFast($inputs, $mid + 1, $end);
    }
}



// for array with non-distinct elements
function magicFastWithDuplicates($inputs, $start, $end) {
    if ($start > $end || $start < 0 || $end >= count($inputs)) {
        return -1;
    }

    $mid = (int) (($start + $end) / 2);
    $midValue = $inputs[$mid];

    if ($midValue == $mid) {
        return $mid;
    }

    // search left
    $leftIndex = min($mid - 1, $midValue);
    $left = magicFastWithDuplicates($inputs, $start, $leftIndex);
    if ($left >= 0) return $left;

    $rightIndex = max($mid + 1, $midValue);
    $right = magicFastWithDuplicates($inputs, $rightIndex, $end);

    return $right;
}



$inputs = [-10, -5, 0, 1, 2, 7, 7, 7, 20, 30, 50, 100];
print_r(magicFastWithDuplicates($inputs, 0, count($inputs) - 1));