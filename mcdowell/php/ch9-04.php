<?php


function getAllSubSet($inputs,  $index) {
    if ($index < 0) return [[]];

    $ans = getAllSubSet($inputs, $index - 1);
    $newInputItem = $inputs[$index];

    $newAns = $ans;
    foreach ($ans AS $v) {
        $newAns[] = array_merge( $v, [$newInputItem]);
    }
    return $newAns;
}


$inputs = [1,2,3,4,5];
print_r(getAllSubSet($inputs, count($inputs) - 1));