<?php

function combination($inputs, $size) {
    $ans = [];

    foreach($inputs AS $v) {
        $ans[] = [ $v ];
    }

    return doCombination($inputs, $size - 1, $ans);

}

function doCombination($inputs, $size, $ans) {
    if ($size == 0) return $ans;

    $newAns = [];

    foreach ($ans AS $item) {
        foreach ($inputs AS $v) {
            if (!in_array($v, $item)) {
                $newItem = $item;
                $newItem[] = $v;
                $newAns[] = $newItem;
            }
        }
    }

    return doCombination($inputs, $size - 1, $newAns);
}



print_r(combination([1,2,3], 2));