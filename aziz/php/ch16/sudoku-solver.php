<?php

function sudokuSolver($inputs) {
    return helper(0, 0, $inputs);
}


function helper($i, $j, &$inputs) {

    if ($i == count($inputs)) {
        $i = 0;
        if (++$j == count($inputs[$i])) {
            return true;
        }
    }

    if ($inputs[$i][$j] != 0) {
        return helper($i + 1, $j, $inputs);
    }

    for($val = 1; $val <= count($inputs); $val ++ ) {
        if (validToAddVal($inputs, $i, $j, $val)) {
            $inputs[$i][$j] = $val;

            if (helper($i + 1, $j, $inputs)) {
                return true;
            }
        }
    }

    $inputs[$i][$j] = 0;
    return false;
}


function validToAddVal(&$inputs, $i, $j, $val) {
    foreach($inputs AS $row) {
        if ($val == $row[$j]) return false;
    }

    for ($k = 0; $k < count($inputs); $k ++ ) {
        if ($val == $inputs[$i][$k]) {
            return false;
        }
    }

    $regionSize = floor(sqrt(count($inputs)));
    $I = floor($i/$regionSize);
    $J = floor($j/$regionSize);

    for ($a = 0; $a < $regionSize; $a ++ ) {
        for ( $b = 0; $b < $regionSize; $b ++ ) {
            if ($val == $inputs[$regionSize * $I + $a][$regionSize * $J + $b]) {
                return false;
            }
        }
    }
}