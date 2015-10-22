<?php

error_reporting(E_ALL & ~E_NOTICE);


function countCombination($totalScore, $scoreWays = [2,3,7]) {
    $combinations = [];
    $combinations[0] = 1;

    foreach($scoreWays as $score) {
        for($j = $score; $j <= $totalScore; $j ++ ) {
            $combinations[$j] += $combinations[$j - $score];
            echo "c $score $j {$combinations[$j]}\n";
        }
    }

    print_r($combinations);

    return $combinations[$totalScore];
}


print_r(countCombination(5));


function countPermutations($k, $scoreWays = [2,3,7]) {
    $permutations = [];
    $permutations[0] = 1;

    for($i = 0; $i <= $k; $i ++ ){
        foreach($scoreWays AS $score) {
            if ($i >= $score) {
                $permutations[$i] += $permutations[$i - $score];
            }
            echo "p $i $score {$permutations[$i]}\n";
        }
    }
    print_r($permutations);

    return $permutations[$k];
}


echo "\n\n";

print_r(countPermutations(5));