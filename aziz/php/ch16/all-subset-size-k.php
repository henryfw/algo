<?php

function subsetSizeK($inputs, $k) {
    $ans = [];
    $partialCombination = [];
    helper($inputs, $k, 0, $partialCombination, $ans);

    return $ans;
}


function helper($inputs, $k, $offset, &$partialCombination, &$ans) {

    echo "called $offset: " . implode(',', $partialCombination) . "\n";

    if (count($partialCombination) == $k) {
        $ans[] = $partialCombination;
        return;
    }

    $numRemaining = $k - count($partialCombination);

    for( $i = $offset; $i < count($inputs) && $numRemaining < count($inputs) - $i + 1; $i ++  ) {
        $partialCombination[] = $inputs[$i];
        helper($inputs, $k, $i + 1, $partialCombination, $ans);
        array_pop($partialCombination);
    }
}



print_r(subsetSizeK([1,2,3,4,5],3));