<?php


// 0 1 2 3 4 5 6

function deleteArrayElement(&$input, $k) {

    $writeToIndex = 0;
    for($i = 0, $ii = count($input); $i < $ii; $i ++) {
        if ($i != $k) {
            $input[$writeToIndex] = $input[$i];
            $writeToIndex ++;
        }
    }

    return $writeToIndex;
}



