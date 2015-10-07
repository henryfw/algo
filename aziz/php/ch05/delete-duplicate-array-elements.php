<?php

function deleteSortedDuplicates(array &$inputs) {
    $writeIndex = 1;
    for ($i = 1; $i < count($inputs); $i ++) {
        if ($inputs[$i] != $inputs[$writeIndex - 1]) {
            $inputs[$writeIndex] = $inputs[$i];
            $writeIndex ++;
        }
    }
}

$inputs = [1,1,2,2,3,4];
deleteSortedDuplicates($inputs);
print_r($inputs);