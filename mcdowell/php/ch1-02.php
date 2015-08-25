<?php


function reverseString($text) {
    if ($text === null) return "";

    if (!is_string($text)) {
        throw new Exception("input is not a string");
    }

    $length = strlen($text);

    for ($i = 0, $j = floor($length/2); $i < $j; $i ++) {
        $tmp = $text{$i};
        $text{$i} = $text{$length - $i};
        $text{$length - $i} = $tmp;
    }

    return $text;
}


var_dump(reverseString('abcdef'));
var_dump(reverseString('abcdefg'));
var_dump(reverseString(''));