<?php

function findSubMatrixWithLargestSum($inputs) {
    $rowCount = count($inputs);
    $colCount = count($inputs[0]);

    $partialSum = array();
    $maxSum = 0;

    for ($rowStart = 0; $rowStart < $rowCount; $rowStart ++ ) {
        $partialSum = array();

        for ($rowEnd = $rowStart; $rowEnd < $rowCount; $rowEnd ++) {
            for ($i = 0; $i < $colCount; $i ++) {
                $partialSum[$i] += $inputs[$rowEnd][$i];
            }
        }

        $tempMaxSum = maxSubArray($partialSum, $colCount);

        $maxSum = max($maxSum, $tempMaxSum);
    }
    return $maxSum;
}

function maxSubArray($A, $n) {
    $maxSum = 0;
    $runningSum = 0;

    for ($i = 0 ; $i < $n; $i ++) {
        $runningSum += $A[$i];
        $maxSum = max($maxSum, $runningSum);

        if ($runningSum < 0) {
            $runningSum = 0;
        }
    }
    return $maxSum;
}


$inputs = [
  [1, 1, 0, 0, 0],
  [0, 0, 0, 5, 0],
  [0, 0, 0, 11, 0],
  [0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0],
];


print_r(findSubMatrixWithLargestSum($inputs));