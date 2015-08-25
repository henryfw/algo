<?php

function compressStr($text) {

    $originalLength = strlen($text);

    if (!$originalLength) return "";

    $map = array();

    for ($i = 0; $i < $originalLength; $i ++ ) {
        if (!isset($map[$text{$i}])) {
            $map[$text{$i}] = 1;
        }
        else {
            $map[$text{$i}] ++;
        }
    }

    if (count($map) * 2 < $originalLength) {
        $ans = "";
        foreach($map AS $k => $v) {
            if ($ans) $ans = $ans . ":";
            $ans .= "{$k}{$v}";
        }
        return $ans;
    }
    else {
        return $text;
    }

}



var_dump(compressStr('abaaaaaabbcc'));
var_dump(compressStr('abcdefg'));