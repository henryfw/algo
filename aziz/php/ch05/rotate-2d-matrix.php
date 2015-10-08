<?php

function rotateMatrix(&$m) {

    $endIndex = count($m) - 1;

    for ($i = 0; $i < floor(count($m) / 2); $i ++ ) {
        for ($j = $i; $j < $endIndex - $i; $j ++ ) {

            $tmp = $m[$i][$j];
            printf( "moving %d, %d, to %d, %d \n", $endIndex - $j, $i, $i, $j);
            $m[$i][$j] = $m[$endIndex - $j][$i];
            printf( "moving %d, %d, to %d, %d \n", $endIndex - $i, $endIndex - $j, $endIndex - $j, $i);
            $m[$endIndex - $j][$i] = $m[$endIndex - $i][$endIndex - $j];
            printf( "moving %d, %d, to %d, %d \n", $j, $endIndex - $i, $endIndex - $i, $endIndex - $j);
            $m[$endIndex - $i][$endIndex - $j] = $m[$j][$endIndex - $i];
            printf( "moving %d, %d, to %d, %d \n", $i, $j, $j, $endIndex - $i);
            $m[$j][$endIndex - $i] = $tmp;

        }
    }
}



$m = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];

rotateMatrix($m);


print_r($m);

/*
7 4 1
8 5 2
9 6 3
*/