<?php

function isPermuation($str1, $str2) {

    $l1 = strlen($str1);
    $l2 = strlen($str2);

    if ($l1 != $l2) return false;

    $charsInStr1 = array();

    for ($i = 0; $i < $l1; $i ++) {
        if (!isset($charsInStr1[$str1{$i}])) {
            $charsInStr1[$str1{$i}] = 0;
        }
        $charsInStr1[$str1{$i}] ++;
    }

    for ($i = 0; $i < $l2; $i ++) {
        if (!isset($charsInStr1[$str2{$i}])) {
            return false;
        }
        $charsInStr1[$str2{$i}] --;
        if ($charsInStr1[$str2{$i}] == 0) {
            unset($charsInStr1[$str2{$i}]);
        }
    }

    return true;
}

var_dump(isPermuation("bca", "abc"));
var_dump(isPermuation("aaaabc", "baacaa"));

var_dump(isPermuation("aaaabc", "baaca"));
var_dump(isPermuation("xsdf", "baaca"));
