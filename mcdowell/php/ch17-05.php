<?php


function getResult($real, $guess) {
    $hits = 0;
    $psuedohits = 0;
    $guessPass2 = $guess;
    $realLeft = $real;
    $guessMap = [];


    for ($i = 0; $i < count($guess) ; $i ++) {
        if ($guess[$i] == $real[$i]) {
            $hits ++ ;
            unset($realLeft[$i]);
            unset($guessPass2[$i]);
        }
    }


    for ($i = 0; $i < count($guessPass2) ; $i ++) {
        $guessColor = $guessPass2[$i];
        $guessMap[$guessColor] ++;
    }

    for ($i = 0; $i < count($realLeft); $i ++) {
        $realColor = $realLeft[$i];

        if ($guessMap[$realColor]) {
            $guessMap[$realColor] -- ;
            $psuedohits ++;
        }
    }

    return [ 'hits' => $hits, 'psuedohits' => $psuedohits ];
}



print_r(getResult(['r','r', 'g', 'b'], ['r','r', 'g', 'b']));
print_r(getResult(['r','r', 'g', 'b'], ['b','g', 'r', 'r']));
print_r(getResult(['r','r', 'g', 'b'], ['b','g', 'g', 'b']));