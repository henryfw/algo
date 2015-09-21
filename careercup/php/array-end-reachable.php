<?php

// http://www.careercup.com/question?id=5728188153987072


function checkEndReachable($inputs) {
    $i = count($inputs) - 2;
    $fromEnd = 1;

    while ($i >= 0) {
        $fromEnd ++;

        if ($inputs[$i] >= $fromEnd) {
            $fromEnd = 0;
        }

        $i --;
    }
    return $fromEnd == 0;
}



var_dump(checkEndReachable([1,2,0,1,0,1]));
var_dump(checkEndReachable([11,2,0,1,0,1]));
var_dump(checkEndReachable([2,1,0,0,1,1]));