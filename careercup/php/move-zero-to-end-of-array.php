<?php

// http://www.careercup.com/question?id=12986664


// O(n^2)
function moveZeroToEndOfArray(&$inputs) {

    $shiftedCount = 0;
    $length = count($inputs);
    $index = 0;

    while ($index + $shiftedCount < $length) {
        if ($inputs[$index] == 0) {
            $shiftedCount ++;
            for ($j = $index; $j < $length - 1; $j ++) {
                $inputs[$j] = $inputs[$j + 1];
            }
            $inputs[$length - 1] = 0;
        }
        else {
            $index ++;
        }
    }
}


// 2 pointer with runner method
function moveZeroToEndOfArrayLinear(&$inputs) {
    $length = count($inputs);
    $savePosition = 0;
    $runner = 0;

    while ($runner < $length) {
        if ($inputs[$runner] != 0 ) {
            $inputs[$savePosition] = $inputs[$runner];
            $savePosition ++;
        }
        $runner ++;
    }

    while ($savePosition < $length) {
        $inputs[$savePosition] = 0;
        $savePosition++;
    }
}

$inputs = [1, 2, 0, 4, 0, 8, 1];

moveZeroToEndOfArrayLinear($inputs);

print_r($inputs);
