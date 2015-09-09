<?php

function printPairSums($inputs, $target) {
    sort($inputs);
    $results = [];

    $first = 0;
    $last = count($inputs) - 1;

    while($first < $last) {
        $sum =  $inputs[$first] + $inputs[$last];
        if ($sum == $target) {
            $results[] = [$inputs[$first], $inputs[$last]];
            $first ++;
            $last --;
        }
        else {
            if ($sum < $target) $first ++;
            else $last --;
        }

    }

    return $results;
}

print_r(printPairSums([1,2,3,4,5,6,7,8,9,10], 10));