<?php


function findStartCity($gas, $distance) {
    $carry = 0;

    $cityAndGas = [0, 0];

    for ($i = 1; $i < count($gas); $i ++ ) {
        $carry += $gas[$i - 1] - $distance[$i - 1];
        if ($carry < $cityAndGas[1]) {
            $cityAndGas = [$i, $carry];
        }
    }
    return $cityAndGas[0];
}


// find the city that if arriving into it, has the least amount of gas
// this means you start with the most amount of gas

