<?php


function decodeString($str) {
    $ans = "";

    $count = 0;

    for($i = 0; $i < strlen($str); $i ++) {
        $char = $str{$i};
        if (is_numeric($char)) {
            $count = $count * 10 + $char;
        }
        else {
            $ans .= str_repeat($char, $count);
            $count = 0;
        }
    }

    return $ans;
}



function encodeString($str) {
    $ans = '';

    for ($i = 1, $count = 1; $i <= strlen($str); $i ++) {
        if ($i == strlen($str) || $str[$i] != $str[$i - 1]) {
            // found new char
            $ans .= $count . $str[$i - 1];
            $count = 1;
        }
        else {
            $count ++;
        }
    }

    return $ans;
}


echo encodeString("aaabbbcddefff");
echo "\n";
echo decodeString("3a3b1c2d1e3f");