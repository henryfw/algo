<?php

function romanToInteger($roman) {
    $roman = str_split(strtoupper($roman));

    $ans = 0;

    $map = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];

    $ans = $map[end($roman)];

    for ($i = count($roman) - 2; $i >= 0; $i --) {
        if ($map[$roman[$i]] < $map[$roman[$i + 1]]) {
            $ans -= $map[$roman[$i]];
        }
        else {
            $ans += $map[$roman[$i]];
        }
    }

    return $ans;

}



echo romanToInteger("XVI");

 