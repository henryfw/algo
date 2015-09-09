<?php

function pickRandomSubset($inputs, $m) {
    if (count($inputs) < count($m)) {
        throw new Exception("Subset count is too low.");
    }
    $subset = array_slice($inputs, 0, $m);

    for($i = $m; $i < count($inputs); $i ++) {
        $k = rand(0, $i);
        if ($k < $m) {
            $subset[$k] = $inputs[$i];
        }
    }
    return $subset;
}


print_r(pickRandomSubset([1,2,3,4,5], 3));