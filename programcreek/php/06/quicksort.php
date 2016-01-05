<?php


function quickSort(&$inputs, $left, $right) {
    $start = $left;
    $end = $right;

    if ($left < $right) {
        $pivot = $inputs[ floor(($left+$right)/2) ];

        while ($left <= $right) {

            while($inputs[$left] < $pivot) {
                $left ++;
            }
            while($inputs[$right] > $pivot) {
                $right --;
            }

            if ($left <= $right) {
                $tmp = $inputs[$right];
                $inputs[$right] = $inputs[$left];
                $inputs[$left] = $tmp;
                $left ++;
                $right --;
            }
        }

        quickSort($inputs, $start, $right);
        quickSort($inputs, $left, $end);
    }
}

$inputs = [99,32,22,1,2,345,6,7,3];

quickSort($inputs, 0, count($inputs) - 1);

print_r($inputs);