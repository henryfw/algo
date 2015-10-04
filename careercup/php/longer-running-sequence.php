<?php

// http://www.careercup.com/question?id=14848680


function findLongestSequence($input) {
    $best = 0;
    $currentRunning = 1;

    for ($i = 1; $i < count($input); $i ++) {
        if ($input[$i] == $input[$i - 1] + 1) {
            $currentRunning ++;
        }
        else {
            $best = max($best, $currentRunning);
            $currentRunning = 1;
        }
    }
    $best = max($best, $currentRunning);

    return $best;
}


echo findLongestSequence([1,3,4,5,6,9,10]);