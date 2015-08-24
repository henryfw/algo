<?php

function mergeArrays($A, $B) {
    $aLen = count($A);
    $bLen = count($B);

    $A = $A + $B;

    while ($aLen > 0 && $bLen > 0) {
        if ($A[$aLen - 1] > $B[$bLen -1]) {
            $A[$aLen + $bLen - 1] = $A[$aLen - 1];
            $aLen -- ;
        }
        else {
            $A[$aLen + $bLen - 1] = $B[$bLen - 1];
            $bLen -- ;
        }
    }

    while ($bLen > 0) {
        $A[$bLen + $aLen - 1 ] = $B[$bLen - 1];
        $bLen --;
    }

    return $A;
}



print_r( mergeArrays([2,3,4], [4,5,6,7,8] )  );