<?php



function getMaxArea($heights) {
    $i = 0;
    $j = count($heights) - 1;
    $maxArea = 0;

    while ($i < $j){
        $maxArea = max($maxArea, min(
            $heights[$i], $heights[$j]
        ) * ($j - $i));

        if ($heights[$i] > $heights[$j]) {
            $j --;
        }
        else if ($heights[$i] < $heights[$j]) {
            $i ++;
        }
        else {
            $i ++;
            $j --;
        }
    }

    return $maxArea;
}

$inputs = [1, 2, 1, 3, 4, 4, 5, 6, 2, 1, 3, 1, 3, 2, 1, 2, 4, 1];
echo getMaxArea($inputs);

