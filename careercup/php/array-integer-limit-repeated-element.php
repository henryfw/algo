<?php

// http://www.careercup.com/question?id=6026101998485504

function limitRepeatedElementInArray($inputs, $maxRepeat) {
    if (count($inputs) <= 1) return $inputs;
    if ($maxRepeat <= 0) throw new Exception("maxRepeat is must be >= 1");

    $ans = [];

    $repeated = 0;
    $lastElement = null;
    for ($i = 0, $ii = count($inputs); $i < $ii; $i ++) {
        if ($lastElement != null && $inputs[$i] == $lastElement) {
            $repeated ++;
        }
        else {
            $lastElement = $inputs[$i];
            $repeated = 1;
        }

        if ($repeated <= $maxRepeat) {
            $ans[] = $inputs[$i];
        }

    }

    return $ans;

}


print_r(limitRepeatedElementInArray([2,1,1,1,3,4,2,2,2,2,8], 2));