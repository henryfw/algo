<?php

function maxSubArray($inputs) {
    $range = [0,0];

    $minIndex= - 1;
    $minSum = 0;
    $sum = 0;
    $maxSum = -PHP_INT_MAX;


    for ($i = 0; $i < count($inputs); $i ++ ) {
        $sum += $inputs[$i];
        if ($sum < $minSum) {
            echo "new minIndex: sum: $sum, minSum: $minSum, minIndex: $i\n";
            $minSum = $sum;
            $minIndex = $i;
        }
        if ($sum - $minSum > $maxSum) {
            $maxSum = $sum - $minSum;
            $range = [$minIndex + 1, $i ];
            echo "new maxSum: maxSum: $maxSum, range: $range[0]-$range[1]\n";
        }


    }
    return $range;
}


$inputs = [
    -5, 40, 523, 12, -335, -385, -124, 481, -31
];
print_r(maxSubArray($inputs));