<?php

function removeDup($A) {
    if (count($A) <= 1) {
        return $A;
    }

    $lastValue = $A[0];
    $skipped = 0;
    for ($i = 1, $j = count($A); $i < $j; $i ++) {
        if ($A[$i] == $lastValue) {
            $skipped ++;
        }
        else {
            if ($skipped > 0) {
                $A[$i - $skipped] = $A[$i];
            }
            $lastValue = $A[$i];
        }

    }

    array_splice($A, count($A) - $skipped);
    return $A;
}



function removeDupAllowedMaxTwo($A) {
    if (!is_array($A)) {
        throw new Exception("Input must be an array.");
    }

    if (count($A) <= 2) {
        return $A;
    }

    $lastValue = $A[1];
    $skipped = 0;
    for ($i = 2, $j = count($A); $i < $j; $i ++) {
        if ($A[$i] == $lastValue && $A[$i] == $A[$i - 2]) {
            $skipped ++;
        }
        else {
            if ($skipped > 0) {
                $A[$i - $skipped] = $A[$i];
            }
            $lastValue = $A[$i];
        }

    }

    array_splice($A, count($A) - $skipped);
    return $A;
}



print_r(removeDup([1,1,2,3,4,5]));
print_r(removeDupAllowedMaxTwo([1,1,1,1,1,2,2,2,3,4,5,5,6]));