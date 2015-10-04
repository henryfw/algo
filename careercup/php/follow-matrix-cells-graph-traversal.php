<?php

// http://www.careercup.com/question?id=6685828805820416


function canReachEnd($inputs) {
    $visited = []; // key is "row-col"

    $pos = [0, 0];

    while (true) {

        $key = "{$pos[0]}-{$pos[1]}";
        echo "$key \n";
        if (isset($visited[$key])) return false;
        $visited[$key] = 1;

        if (!isset($inputs[$pos[0]][$pos[1]])) return false;

        $value = $inputs[$pos[0]][$pos[1]];

        if ($value === -1) return true;

        $pos = $value;
    }
}


$inputs = [
    [[0,1], [1,2], [3,3]],
    [[1,1], [3,3], [2,2]],
    [[3,0], [1,3], -1]
];

var_dump(canReachEnd($inputs));