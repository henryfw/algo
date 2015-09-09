<?php

function findUnsortedSequence($inputs) {
    $endLeft = count($inputs) - 1;
    for ($i = 1; $i < count($inputs); $i ++) {
        if ($inputs[$i] < $inputs[$i - 1]) {
            $endLeft = $i - 1;
            break;
        }
    }

    $startRight = 0;
    for ($i = count($inputs) - 2; $i >= 0; $i --) {
        if ($inputs[$i] > $inputs[$i + 1]) {
            $startRight = $i + 1;
            break;
        }
    }

    $minIndex = $endLeft + 1;
    if ($minIndex >= count($inputs)) return [];

    $maxIndex = $startRight - 1;

    for ($i = $endLeft; $i <= $startRight; $i++) {
        if ($inputs[$i] < $inputs[$minIndex]) $minIndex = $i;
        if ($inputs[$i] > $inputs[$maxIndex]) $maxIndex = $i;
    }

    $leftIndex = 0;
    $comp = $inputs[$minIndex];
    for ($i = $endLeft - 1; $i >= 0; $i --) {
        if ($inputs[$i] <= $comp) {
            $leftIndex = $i + 1;
            break;
        }
    }

    $rightIndex = count($inputs) - 1;
    $comp = $inputs[$maxIndex];
    for ($i = $startRight; $i < count($inputs); $i ++) {
        if ($inputs[$i] >= $comp) {
            $rightIndex = $i - 1;
            break;
        }
    }

    return [$leftIndex, $rightIndex];
}


print_r(findUnsortedSequence([1,2,3,4,5,4,10,11,9,20,21,22,23]));

