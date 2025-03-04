<?php

function uniquePaths($m, $n) {

    if (!$m || !$n) return 0;
    if ($m == 1 || $n == 1) return 1;

    $dp = [];

    // left
    for ($i = 0; $i < $m; $i ++) {
        $dp[$i][0] = 1;
    }

    // top
    for ($i = 0; $i < $n; $i ++) {
        $dp[0][$i] = 1;
    }

    // rest of table
    for ($i = 1; $i < $m; $i ++) {
        for ($j = 1; $j < $n; $j ++) {
            $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
        }
    }

    return $dp[$m - 1][$n - 1];
}

