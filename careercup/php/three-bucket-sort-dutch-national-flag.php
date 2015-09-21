<?php

// values are 1,2,3
function sortThreeValues(&$inputs) {
    $mid = 0;
    $low = 0;
    $high = count($inputs) - 1;

    while ($mid <= $high) {
        if ($inputs[$mid] == 1) {
            swap($inputs, $mid, $low);
            $mid ++;
            $low ++;
        }
        else if ($inputs[$mid] == 2) {
            $mid ++;
        }
        else {
            swap($inputs, $mid, $high);
            $high --;
        }

//        echo implode(" ", $inputs) . "\n";
    }
}

function swap(&$inputs, $a, $b) {
    $tmp = $inputs[$a];
    $inputs[$a] = $inputs[$b];
    $inputs[$b] = $tmp;
}


$inputs = [1,3,2,1,3,2,1,3,2];
sortThreeValues($inputs);

print_r($inputs);