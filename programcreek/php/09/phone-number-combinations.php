<?php

function phoneNumberCombination($digits) {
    $map = [
        2 => ['A', 'B', 'C'],
        ['D', 'E', 'F'],
    ];// number to letters

    $ans = [''];


    for ($i = 0; $i < count($digits); $i ++ ) {
        $newAns = [];

        foreach($ans AS $item) {
            $letters = $map[$digits[$i]];
            foreach($letters AS $letter) {
                $newAns[] = $item . $letter;
            }
        }
        $ans = $newAns;
    }

    return $ans;
}

$ans = phoneNumberCombination([2,2,3,3]);
print_r($ans);
