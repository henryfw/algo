<?php

function generateParenthesis($n) {
    if ($n == 1) return array('()' => 1);

    $ans = generateParenthesis($n - 1);

    // outside, before, after

    $newAns = [];

    foreach ($ans AS $k => $ignore) {
        $newAns[ '(' . $k . ')' ] = 1;
        $newAns[ '()' . $k  ] = 1;
        $newAns[  $k . '()' ] = 1;
    }

    return $newAns;
}

print_r(generateParenthesis(4));