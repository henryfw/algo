<?php

// n^2 time, 1 space
function isUnique($text) {
    if (!$text) return true;

    $l = strlen($text);

    for ($i = 0; $i < $l; $i ++) {
        for ($j = 0; $j < $l; $j ++) {
            if ($i == $j) continue;
            if ($text{$i} == $text{$j}) {
                return false;
            }
        }
    }
    return true;
}



// n space, n time
function isUnique2($text) {
    if (!$text) return true;

    $mapOfChars = array();

    for ($i = 0; $i < strlen($text); $i ++) {
        if (isset($mapOfChars[$text{$i}])) {
            return false;
        }
        else {
            $mapOfChars[$text{$i}] = 1;
        }
    }
    return true;
}

// nlogn time, 1 space
function isUnique3($text) {
    if (!$text) return true;

    // implement quick sort on string sort first
    $text = str_split($text);
    sort($text);
    $text = implode('', $text);

    for ($i = 1; $i < strlen($text); $i ++) {
        if ($text{$i} == $text{$i - 1}) return false;
    }

    return true;
}




var_dump(isUnique('abcd'));
var_dump(isUnique('abcad'));



var_dump(isUnique2('abcd'));
var_dump(isUnique2('abcad'));



var_dump(isUnique3('abcd'));
var_dump(isUnique3('abcad'));

