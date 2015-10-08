<?php

// O(n)

function replaceAndRemove(array $s, $removeChar, $replaceChar, $replacementChar, $replaceTimes = 2) {
    $writeIndex = 0;

    $replaceCount = 0;

    foreach($s AS $char) {
        if ($char != $removeChar) {
            $s[$writeIndex] = $char;
            $writeIndex ++;
        }
        if ($char == $replaceChar) {
            $replaceCount += $replaceTimes - 1;
        }
    }

    $s = array_slice($s, 0, $writeIndex);

    $endIndex = count($s) + $replaceCount - 1;

    $curIndex = $writeIndex - 1;

    while ($endIndex >= 0) {
        if ($s[$curIndex] == $replaceChar) {

            for ($i = 0; $i < $replaceTimes; $i ++) {
                $s[$endIndex] = $replacementChar;
                $endIndex --;
            }


        }
        else {
            $s[$endIndex] = $s[$curIndex];
            $endIndex --;
        }

        $curIndex --;
    }

    return $s;
}


print_r(replaceAndRemove(['a', 'd', 'a','b','b','d','d'], 'b', 'd', 'z', 2));