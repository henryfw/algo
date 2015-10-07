<?php


function matrixSpiralOrder($m) {
    $shift = [
        [0,1], [1,0],
        [0,-1], [-1,0]
    ];

    $width = count($m);

    $dir = 0;
    $x = 0;
    $y = 0;

    $ordering = [];

    for ($i = 0; $i < $width * $width; $i ++) {
        $ordering[] = $m[$x][$y];
        $m[$x][$y] = 0;
        $nextX = $x + $shift[$dir][0];
        $nextY = $y + $shift[$dir][1];

        if ($nextX < 0 || $nextX >= $width || $nextY < 0 || $nextY >= $width ||
            $m[$nextX][$nextY] == 0) {
            $dir = ($dir + 1) % 4;

            $nextX = $x + $shift[$dir][0];
            $nextY = $y + $shift[$dir][1];


        }
        $x = $nextX;
        $y = $nextY;

    }

    return $ordering;
}


$m = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];

print_r(matrixSpiralOrder($m));