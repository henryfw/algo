<?php


function insertionSort(&$inputs) {
    $l = count($inputs);
    for ($i = 1; $i < $l; $i ++) {
        $pivotValue = $inputs[$i];
        $swapIndex = $i;
        for ($j = $i - 1; $j >= 0; $j --) {
            if ($inputs[$j] > $pivotValue) {
                $swapIndex = $j;
                $inputs[$j + 1] = $inputs[$j];
            }
            else {
                break;
            }
        }
        $inputs[$swapIndex] = $pivotValue;
    }
}


$inputs = [10,5,2,1,99];

insertionSort($inputs);

print_r($inputs);