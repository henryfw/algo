<?php

// http://www.careercup.com/question?id=5092486548553728

function checkOneEditDistance($str1, $str2) {
    $l1 = strlen($str1);
    $l2 = strlen($str2);

    if ($l1 > $l2) return checkOneEditDistance($str2, $str1);

    if ($l1 != $l2 && $l1 + 1 != $l2) return false;

    $i = 0;
    while ($i < $l1) {
        if ($str1[$i] != $str2[$i]) {
            if ($l1 == $l2) {
                return substr($str1, $i + 1) == substr($str2, $i + 1);
            }
            else {
                return substr($str1, $i) == substr($str2, $i + 1);
            }
        }
        $i ++;
    }

    // if we get to this point both strs are the same for first $l1 letters
    return $l1 != $l2;
}

var_dump(checkOneEditDistance('abc','abe'));
var_dump(checkOneEditDistance('abc','abcd'));
var_dump(checkOneEditDistance('abcd','abc'));
var_dump(checkOneEditDistance('xxx','abc'));