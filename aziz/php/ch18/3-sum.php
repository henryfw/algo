<?php


function hasThreeSum($inputs, $targetSum) {

    sort($inputs);

    foreach($inputs AS $i) {
        if (hasTwoSum($inputs, $targetSum - $i)) {
            return true;
        }
    }

    return false;

}


function hasTwoSum($inputs, $targetSum) {
    $left = 0;
    $right = count($inputs) - 1;

    while ($left <= $right) {
        $check = $inputs[$left] + $inputs[$right];
        if ($check == $targetSum) return true;
        else if ($check > $targetSum) $right --;
        else $left ++;
    }

    return false;
}


var_dump(hasThreeSum([2,3,4], 9));
var_dump(hasThreeSum([2,3,4,11], 16));
var_dump(hasThreeSum([2,3,4,11], 88));