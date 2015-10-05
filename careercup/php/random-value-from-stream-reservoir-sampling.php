<?php

// http://www.careercup.com/question?id=14474750


function reservoirSample($inputs) {
    $sample = $inputs[0];

    for ($i = 1; $i < count($inputs); $i ++) {
        if (rand(0, $i)  == 0) {
            $sample = $inputs[$i];
        }
    }

    return $sample;
}


$samples = [];
for ($i = 0; $i < 1000; $i ++) {
    $ans = reservoirSample([0,1,1,1,1,1,1,1,1,1,1,9,1,1]);
    if (!isset($samples[$ans])) $samples[$ans] = 0;
    $samples[$ans] ++;
}

print_r($samples);