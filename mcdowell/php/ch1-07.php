<?php

function setZeros(&$matrix) {
    if (!is_array($matrix) || !is_array($matrix[0])) {
        throw new Exception("Input is not a matrix.");
    }

    $rowFlags = [];
    $colFlags = [];

    for ($i = 0; $i < count($matrix); $i ++) {
        for ($j = 0; $j < count($matrix[0]); $j++ ) {
            if ($matrix[$i][$j] == 0) {
                $rowFlags[] = $i;
                $colFlags[] = $j;
            }
        }
    }

    foreach($rowFlags AS $row) {
        for($j = 0; $j < count($matrix[0]); $j ++) {
            $matrix[$row][$j] = 0;
        }
    }
    foreach($colFlags AS $col) {
        for ($i = 0; $i < count($matrix); $i ++) {
            $matrix[$i][$col] = 0;
        }
    }

}

$ans = [
   [1,2,3,4,5,6],
   [1,2,3,4,5,6],
   [1,2,3,0,5,6],
   [1,0,3,2,5,6],
   [1,2,3,4,5,6],
];

setZeros($ans);

print_r($ans);

