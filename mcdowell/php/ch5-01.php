<?php


function insertNum($original, $toInsert, $lowIndex, $highIndex) {

//    for ($i = $lowIndex; $i <= $highIndex; $i ++ ) {
//        $original = $original & ~(1 << $i) ;
//    }

    $original = $original & ~ ((pow(2, $highIndex - $lowIndex + 1) - 1 ) << $lowIndex);

    $original = $original | ($toInsert << $lowIndex);

    return $original;
}


echo decbin(insertNum(0b10000000, 0b111, 2, 5));