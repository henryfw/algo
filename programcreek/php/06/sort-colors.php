<?php


/*
 * Given an array with n objects colored red, white or blue, sort them so that objects of the same color are adjacent,
 * with the colors in the order red, white and blue.
*/

function sortColors(&$inputs) {
    if (!$inputs || count($inputs) < 2) return;

    $count = [];
    foreach($inputs AS $v) {
        if (!isset($count[$v])) $count[$v] = 0;
        $count[$v] ++;
    }

    $i = 0;
    foreach($count AS $k => $v) {
        for ($j = 0; $j < $v; $j ++) {
            $inputs[$i ++] = $k;
        }
    }
}


$inputs = [1,2,3,1,1,1,2,2,3,1];

sortColors($inputs);
print_r($inputs);