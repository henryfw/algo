<?php

// http://www.careercup.com/question?id=6009238532915200

function check($input) {
    $input = strtoupper($input);
    $left = 0;
    $right = strlen($input) - 1;
    while($left < $right) {
        if (!isLetter($left)) $left ++;
        else if (!isLetter($right)) $right ++;
        else {
            if ($input[$left] != $input[$right]) {
                return false;
            }
            else {
                $left ++;
                $right ++;
            }
        }

    }
    return true;
}

function isLetter($char) {
    $startAllowed = ord('A');
    $endAllowed = ord('Z');
    return $char >= $startAllowed && $char <= $endAllowed;
}


var_dump(check("A man, a plan, a canal -- Panama!"));