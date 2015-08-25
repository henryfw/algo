<?php

function isRotation($s1, $s2) {

    if (!is_string($s1) || !is_string($s2)) {
        throw new Exception("Inputs must be strings.");
    }

    if (!$s1 || !$s2 || strlen($s1) != strlen($s2)) return false;

    return strpos($s1.$s1, $s2) !== false;
}


var_dump(isRotation('abcd', 'cdab'));
var_dump(isRotation('abcasdfsdfd', 'cdab'));