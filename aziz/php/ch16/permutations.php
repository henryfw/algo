<?php

// the other one is probably easier to do
// mcdowell/php/ch9-05.php


function permutation($inputs) {
    $ans = [];
    helper(0, $inputs, $ans);
    return $ans;
}

function helper($i, &$inputs, &$ans) {
    echo "called $i: " . implode(',', $inputs) . "\n";
    if ($i == count($inputs) - 1) {
        $ans[] = array_slice($inputs, 0);
        return;
    }

    for ($j = $i; $j < count($inputs); $j ++ ) {
        list($inputs[$i], $inputs[$j]) = [$inputs[$j], $inputs[$i]];
        helper($i + 1, $inputs, $ans);
        list($inputs[$i], $inputs[$j]) = [$inputs[$j], $inputs[$i]];
    }
}

print_r(permutation([1,2,3,4]));

