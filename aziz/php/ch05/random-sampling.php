<?php


function randomSample(&$inputs, $k) {

    $l = count($inputs);

    for ($i = 0; $i < $k; $i ++ ){
        $indexToSwap = rand($i, $l - 1);
        swap($inputs, $i, $indexToSwap);
    }
}


function swap(&$inputs, $a, $b) {
    $tmp = $inputs[$a];
    $inputs[$a] = $inputs[$b];
    $inputs[$b] = $tmp;
}
