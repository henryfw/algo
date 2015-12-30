<?php

function search($inputs, $t) {
    $left = 0;
    $right = count($inputs) - 1;

    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);
        if ($inputs[$mid] == $t) return true;


        if ($inputs[$left] < $inputs[$mid]) {
            if ($inputs[$left] < $t && $inputs[$mid] > $t) {
                $right = $mid - 1;
            }
            else {
                $left = $mid + 1;
            }
        }
        else if ($inputs[$left] > $inputs[$mid]) {
            if ($inputs[$mid] < $t && $inputs[$right] >= $t) {
                $left = $mid + 1;
            }
            else {
                $right = $mid - 1;
            }
        }
        else {
            $left ++;
        }
    }

    return false;
}