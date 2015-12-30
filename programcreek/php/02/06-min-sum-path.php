<?php

function minPathSum($inputs) {
    $m = count($inputs);
    $n = count($inputs[0]);

    $dp = [[$inputs[0][0]]];

    // top
    for ($i = 1; $i < $n; $i ++ ) {
        $dp[0][$i] = $dp[0][$i - 1] + $inputs[0][$i];
    }

    // left
    for ($i = 1; $i < $m; $i++) {
        $dp[$i][0] = $dp[$i - 1][0] + $inputs[$i][0];
    }

    // fill up table
    for ($i = 1; $i < $m; $i ++) {
        for ($j = 1; $j < $n; $j ++ ) {
            if ($dp[$i - 1][$j] > $dp[$i][$j-1]){
                $dp[$i][$j] = $dp[$i][$j-1] + $inputs[$i][$j];
            }
            else {
                $dp[$i][$j] = $dp[$i-1][$j] + $inputs[$i][$j];
            }
        }
    }
    return $dp[$m-1][$n-1];
}

echo minPathSum([
    [1,1,1,2],
    [1,1,5,1],
    [1,5,1,1],
    [5,1,1,1],
]);