<?php


function findDuplicateAndMissing($inputs) {
    $sum = 0;
    $squareSum = 0;

    for($i = 0; $i < count($inputs); $i ++ ){
        $sum += $i - $inputs[$i];
        $squareSum += $i * $i - $inputs[$i] * $inputs[$i];
    }

    echo "sum: $sum, sq: $squareSum  \n";

    return [
         (($squareSum / $sum - $sum) / 2),
         (($squareSum / $sum + $sum) / 2)
    ];
}


print_r(findDuplicateAndMissing([0,1,2,4,5,5,6,7]));