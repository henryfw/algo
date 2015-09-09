<?php

function findLargestSumSequence($inputs) {

    $largestSum = - PHP_INT_MAX;
    $runningSum = 0;

    foreach($inputs AS $v) {

        $runningSum += $v;

        if ($runningSum > $largestSum) {
            $largestSum = $runningSum;
        }

        if ($runningSum < 0) {
            $runningSum = 0;
        }
    }

    return $largestSum;
}


echo findLargestSumSequence([-9,-5,-3]) . "\n";
echo findLargestSumSequence([-9,-5,-3,1]) . "\n";
echo findLargestSumSequence([-9,-5,-3,1,2,3]) . "\n";
echo findLargestSumSequence([-9,-5,-3,1,2,-9,2,3]) . "\n";