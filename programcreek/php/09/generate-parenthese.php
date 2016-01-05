<?php

// run time is 3^n exponential by experimenting

function generateParentheses($n) {
    $counter = 0;
    $ans = [];
    dfs($ans, "", $n, $n, $counter);
    echo "counter $counter\n\n";
    return $ans;
}


function dfs(&$ans, $s, $left, $right, &$counter) {
    $counter ++;

    if ($left > $right) return;

    echo "dfs called. left: $left, right: $right \n";

    if ($left == 0 && $right == 0) {
        $ans[] = $s;
        echo " adding $s\n";
        return;
    }

    if ($left > 0) {
        dfs($ans, $s . "(", $left - 1, $right, $counter);
    }

    if ($right > 0) {
        dfs($ans, $s . ")", $left, $right - 1, $counter);
    }
}

generateParentheses(11);