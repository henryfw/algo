<?php

function matchParens($k) {

    $ans = [];
    helper($k, $k, "", $ans);

    return $ans;

}



function helper($leftNeeded, $rightNeeded, $validPrefix, &$ans) {

    echo "called l: $leftNeeded, r: $rightNeeded, pre: $validPrefix, added " . ((int) ($leftNeeded == 0 && $rightNeeded == 0) ) . "\n";

    if ($leftNeeded == 0 && $rightNeeded == 0) {
        $ans[] = $validPrefix;
        return;
    }

    // Able to insert '('.
    if ($leftNeeded > 0) {
        helper($leftNeeded - 1, $rightNeeded, $validPrefix . "(", $ans);

    }

    // Able to insert ')'.
    if ($leftNeeded < $rightNeeded) {
        helper($leftNeeded, $rightNeeded - 1, $validPrefix . ")", $ans);
    }
}

print_r(matchParens(3));