<?php


function maxArea($inputs) {
    $max = 0;
    $left = 0;
    $right = count($inputs) - 1;

    while ($left < $right) {
        $max = max($max, ($right - $left) * min($inputs[$left], $inputs[$right]));
        if ($inputs[$left] < $inputs[$right]) {
            $left ++;
        }
        else {
            $right --;
        }
    }

    return $max;
}