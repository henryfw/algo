<?php


function selectionStableSort(&$inputs) {
    for($start = 0; $start < count($inputs); $start ++ ) {
        $smallestIndex = $start;
        for($j = $start; $j < count($inputs); $j ++) {
            if ($inputs[$j] < $inputs[$smallestIndex]) {
                $smallestIndex = $j;
            }
        }
        if ($smallestIndex != $start) {
            insertAndRemove($inputs, $start, $smallestIndex);
        }
    }
}

function insertAndRemove(&$inputs, $insertAt, $moveIndex) {
    if ($insertAt < $moveIndex) {
        $moveIndexValue = $inputs[$moveIndex];
        for($i = $moveIndex; $i > $insertAt; $i --) {
            $inputs[$i] = $inputs[$i - 1];
        }
        $inputs[$insertAt] = $moveIndexValue;
    }
}


$inputs = [10,5,2,1,99];

selectionStableSort($inputs);

print_r($inputs);