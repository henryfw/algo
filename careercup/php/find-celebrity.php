<?php

// http://www.careercup.com/question?id=5090815091146752

/*
Given a set of n people, find the celebrity.
Celebrity is a person who:
1. Knows only himself and no one else
2. Every one else knows this person
*/

function knows($inputs, $source, $target) {
    return in_array($target, $inputs[$source]) !== false;
}

function findCelebrity($inputs) {
    if (count($inputs) == 0) return -1;
    if (count($inputs) == 1) return 0;

    $ans = 0;
    for ($i = 1, $ii = count($inputs); $i < $ii; $i ++) {
        if (knows($inputs, $ans, $i) && !knows($inputs, $i, $ans)) {
            $ans = $i;
        }
    }

    if ($inputs[$ans] == [$ans]) {
        return $ans;
    }
    return - 1;
}

$inputs = array(
    0 => [0,5],
    1 => [0,1,2,3,5],
    2 => [0,2,3,5],
    3 => [0,3,4,5],
    4 => [0,4,1,5],
    5 => [5]
);

echo findCelebrity($inputs);
