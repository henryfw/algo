<?php

// http://www.careercup.com/question?id=5767787551129600

function findSquares($n) {
    $min = 1;
    $max = (int) sqrt($n);

    $results = [];

    while ($min < $max) {
        $sum = $min * $min + $max * $max;
        if ($sum == $n) {
            $results[] = [$min, $max];
            $min ++;
            $max --;
        }
        else if ($sum < $n) {
            $min ++;
        }
        else {
            $max --;
        }
    }
    return $results;
}


var_dump(findSquares(10));