<?php

function searchBstFirstOccurrence($inputs, $k) {
    $left = 0;
    $right = count($inputs) - 1;

    $result = -1;

    while ($left <= $right) {
        $mid = $left + floor(($right - $left) / 2);
        if ($inputs[$mid] > $k) {
            $left = $mid + 1;
        }
        else if ($inputs[$mid] == $k) {
            $result = $mid;
            $right = $mid - 1;
        }
        else {
            $left = $mid + 1;
        }
    }

    return $result;
}