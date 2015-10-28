<?php

function majoritySearch($inputs) {

    $candidate = '';
    $count = 0;


    foreach($inputs AS $in) {
        if ($count == 0) {
            $candidate = $in;
            $count = 1;
        }
        else if ($candidate == $in) {
            $count ++;
        }
        else {
            $count --;
        }
    }

    return $candidate;
}

echo majoritySearch(['abc', 'abc', 'def', 'abc', 'abc', 'a', 'a', 'a']);