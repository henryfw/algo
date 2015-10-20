<?php

function palindromeComposition($inputs) {
    $ans = [];
    $partialPartition = [];
    helper($inputs, 0, $partialPartition, $ans);
    return $ans;
}


function helper($inputs, $offset, &$partialPartition, &$ans) {
    if ($offset == strlen($inputs)) {
        $ans[] = $partialPartition;
        return;
    }

    for ($i = $offset + 1; $i <= strlen($inputs); $i ++ ) {
        $prefix = substr($inputs, $offset, $i - $offset );

        echo  "checking $offset $prefix " .
            (isPalindrome($prefix) ? 'Y' : 'N') . "\n";


        if (isPalindrome($prefix)) {
            $partialPartition[] = $prefix;
            helper($inputs, $i, $partialPartition, $ans);
            array_pop($partialPartition);
        }
    }
}


function isPalindrome($prefix) {
    for ($i = 0, $j = strlen($prefix) - 1; $i < $j; $i ++, $j --) {
        if ($prefix{$i} != $prefix{$j}) return false;
    }
    return true;
}




print_r(palindromeComposition("0204451881"));