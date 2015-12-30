<?php

function numIslands($inputs) {
    $count = 0;

    for ($i = 0; $i < count($inputs); $i ++ ) {
        for ($j = 0; $j < count($inputs[0]); $j ++ ) {
            if ($inputs[$i][$j] == 1) {
                $count ++;
                merge($inputs, $i, $j);
            }
        }
    }

    return $count;
}


function merge(&$grid, $i, $j) {
    if ($i < 0 || $j < 0 || $i >= count($grid) || $j >= count($grid[0])) return;

    //if current cell is water or visited
    if ($grid[$i][$j] != 1) return;

    // set visited to 0
    $grid[$i][$j] = 0;

    // merge adjacent land
    merge($grid, $i - 1, $j);
    merge($grid, $i + 1, $j);
    merge($grid, $i, $j + 1);
    merge($grid, $i, $j - 1);
}


$inputs = "11000
11000
00100
00011";

$inputs = explode("\n", $inputs);
foreach($inputs AS $k => $v) {
    $inputs[$k] = str_split($v);
}

echo numIslands($inputs);