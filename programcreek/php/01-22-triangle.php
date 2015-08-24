<?php

// answer based on comment

function minTotal( array $rows) {
    $bestAns = 0;

    for ($i = 0; $i < count($rows); $i ++) {
        $bestAns += min($rows[$i]);
    }

    return $bestAns;
}



echo minTotal([
    [2],
    [3,4],
    [6,5,7],
    [4,1,8,3]
]);