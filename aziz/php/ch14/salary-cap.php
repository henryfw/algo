<?php

// read the book

function salaryCap($inputs, $targetSum) {

    sort($inputs);

    $unadjustedSalarySum = 0;

    for ($i = 0; $i < count($inputs); $i ++ ) {
        $unadjustedSalarySum += $inputs[$i];
        $adjustedSalarySum = $inputs[$i] * (count($inputs) - ($i + 1));
        if ($unadjustedSalarySum + $adjustedSalarySum >= $targetSum) {
            echo "\$unadjustedSalarySum $unadjustedSalarySum \$adjustedSalarySum $adjustedSalarySum input {$inputs[$i]} \n";
            return ($targetSum - $unadjustedSalarySum + $inputs[$i]) / (count($inputs) - $i);
        }

    }

    return -1;
}


echo salaryCap([20.0, 30.0, 40.0, 90.0, 100.], 210);