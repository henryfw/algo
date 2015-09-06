<?php

function findElement($matrix, $target) {
    $row = 0;
    $col = count($matrix[0]) - 1;

    while ($row < count($matrix) && $col >= 0) {
        if ($matrix[$row][$col] == $target) {
            return [$row, $col];
        }
        else if ($matrix[$row][$col] > $target) {
            $col --;
        }
        else {
            $row ++;
        }
    }
    return false;
}




$inputs = [
    [1,2,3,4,5],
    [5,6,7,8,9],
    [6,7,8,9,10],
    [11,20,23,34,55]
];


print_r(findElement($inputs, 20));