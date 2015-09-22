<?php


// http://www.careercup.com/question?id=9332640

function getIntervals($inputs) {
    // use sum(interval) == count(interval) / 2

    $length = count($inputs);
    $ans = [];

    for ($start = 0; $start < $length; $start ++) {
        $runningSum = 0;
        for ($i = $start; $i < $length; $i ++) {
            $runningSum += $inputs[$i];
            if ($i != $start && $i % 2 == 0) {
                // check
                if ($runningSum == ($start - $i) / 2) {
                    $ans[] = [$start, $i];
                }
            }
        }
    }

    return $ans;

}