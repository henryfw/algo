<?php

function searchBstForValueOfOwnIndex($inputs ) {
    $left = 0;

    $right = count($inputs) - 1;

    while ($left <= $right) {
        $mid = $left + floor(($right - $left) / 2);

        $diff = $inputs[$mid] - $mid;

        if ($diff == 0) return $mid;
        else if ($diff > 0) {
            $right = $mid - 1;
        }
        else {
            $left = $mid + 1;
        }
    }

    return -1;
}