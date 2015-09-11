<?php

function printLongestWord($arr) {
    $map = array();
    foreach($arr AS $v) {
        $map[$v] = true;
    }
    usort($arr, function($a, $b) {
        return strlen($b) - strlen($a); // longest first
    });


    foreach($arr AS $v) {
        if (canBuildWord($v, true, $map)) {
            echo "$v \n";
            return $v;
        }
    }
    return "";
}


function canBuildWord($str, $isOriginalWord, &$map) {
    if (isset($map[$str]) && !$isOriginalWord) {
        return $map[$str];
    }

    for ($i = 1; $i < strlen($str); $i ++) {
        $left = substr($str, 0, $i);
        $right = substr($str, $i);
        if (isset($map[$left]) && $map[$left] == true &&
            canBuildWord($right, false, $map)) {
            return true;
        }
    }
    $map[$str] = false;
    return false;
}


$inputs = [
    'abc', 'a', 'b', 'c', 'aabc', 'bc', 'cab', 'testing', 'tester', 'testingtester'
];

var_dump(printLongestWord($inputs));