<?php

/*
A circus is designing a tower routine consisting of people standing atop one another's
shoulders. For practical and aesthetic reasons, each person must be both shorter
and lighter than the person below him or her. Given the heights and weights of
each person in the circus, write a method to compute the largest possible number
of people in such a tower.
 */

function totalHeight($inputs) {
    $height = 0;
    foreach($inputs AS $k => $v) {
        // subsequent person must be heavier than last
        if ($k > 0 && $inputs[$k][2] <= $inputs[$k - 1][2] ) {
            return 0;
        }
        $height += $v[1];
    }
    return $height;
}



function solve($inputs ) {

    if (empty($inputs)) {
        return [];
    }

    $head = $inputs[0];
    $tail = array_slice($inputs, 1);

    $heightWithHead = ( array_merge([$head], solve( $tail  )));
    $heightWithoutHead = ( solve($tail) );

    $ans = null;
    if (totalHeight($heightWithHead) > totalHeight($heightWithoutHead)) {
        $ans = $heightWithHead;
    }
    else {
        $ans = $heightWithoutHead;
    }
    return $ans;

}

// answer should be a, d, e

$persons = [
    ['b', 12, 200],
    ['c', 15, 150],
    ['a', 10, 100],
    ['d', 17, 110],
    ['e', 20, 190],
];

usort($persons, function($a, $b) {
    return $a[1] - $b[1];
});
print_r(solve($persons));