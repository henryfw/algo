<?php

function getCharKey($key, $place) {
    $data = [
        2 => ['a', 'b', 'c'],
        ['d', 'e', 'f'],
        ['g', 'h', 'i'],
        ['j', 'k', 'l'],
        ['m', 'n', 'o'],
        ['p', 'r', 's'],
        ['t', 'u', 'v'],
        ['w', 'x', 'y'],
    ];

    return $data[$key][$place];
}

function generatePhoneNumbers($inputs) {
    $ans = [];
    $index = 0;
    while($index < count($inputs)) {
        if ($inputs[$index] == 1 || $inputs[$index] == 0) {
            $index ++;
            continue;
        }

        foreach([0,1,2] AS $i) {
            $ans[] = [ getCharKey($inputs[$index], $i) ];
        }
        break;
    }
    return doGeneratePhoneNumbers($inputs, $index + 1, $ans);
}


function doGeneratePhoneNumbers($inputs, $index, $ans) {

    if ($index >= count($inputs)) return $ans;

    if ($inputs[$index] == 1 || $inputs[$index] == 0) {
        return doGeneratePhoneNumbers($inputs, $index + 1, $ans);
    }

    $newAns = [];
    foreach($ans AS $item) {
        foreach([0,1,2] AS $i) {
            $newItem = $item;
            $newItem[] = getCharKey($inputs[$index], $i) ;
            $newAns[] = $newItem;
        }
    }
    return doGeneratePhoneNumbers($inputs, $index + 1, $newAns);

}



print_r(generatePhoneNumbers([1,3,4]));