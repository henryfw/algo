<?php

// http://www.careercup.com/question?id=14847690



function findMaxSumWithNoAdjacentElements($inputs, $startIndex, $selected) {

    if ($startIndex >= count($inputs)) {
        return $selected;
    }

    $nextValue = $inputs[$startIndex];
    $sumUsingNext = findMaxSumWithNoAdjacentElements($inputs, $startIndex + 2, array_merge($selected, [$nextValue]));
    $sumNotUsingNext = findMaxSumWithNoAdjacentElements($inputs, $startIndex + 1, $selected);

    return array_sum($sumUsingNext) > array_sum($sumNotUsingNext) ? $sumUsingNext : $sumNotUsingNext;
}

$inputs = [1,2,3,4,5,6];

print_r(findMaxSumWithNoAdjacentElements($inputs, 0, []));
