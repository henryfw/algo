<?php

function replaceSpace($text) {
    $spaceCount = 0;
    $originalLength = strlen($text);

    if (!$originalLength) return "";

    // count spaces first
    for ( $i = 0 ; $i < $originalLength; $i ++ ) {
        if ($text{$i} == ' ') {
            $spaceCount ++;

            // pad more space
            $text .= '--';
        }
    }

    // determine max length of end
    $newLength = $originalLength + $spaceCount * 2;

    $padding = $spaceCount  * 2;
    // work backwords
    for ($i = $originalLength - 1; $i >= 0; $i --) {
        if ($text{$i} == ' ') {
            $text{$newLength - 1} = '0';
            $text{$newLength - 2} = '2';
            $text{$newLength - 3} = '%';
            $newLength -= 3;
        }
        else {
            $text{$newLength - 1} = $text{$i};
            $newLength --;
        }
    }

    return $text;
}



echo replaceSpace("abc def gef ") . "\n";
echo replaceSpace(" a ") . "\n";
echo replaceSpace("aaa") . "\n";