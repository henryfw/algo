<?php

function searchSmallest($inputs) {
    $left = 0;
    $right = count($inputs) - 1;

    while($left < $right) {
        $mid = $left + floor(($right - $left) / 2);

        if ($inputs[$mid] > $inputs[$right]) {
            $left = $mid + 1;
        }
        else {
            // mid < right
            $right = $mid;
        }
    }

    return $left; // left == right
}