<?php

//  http://www.careercup.com/question?id=12945663

// for basketball use DP. ways(n) = ways(n-2) + ways(n-3)

function ways($score) {
    static $cache = [];
    if ($score <= 1) return 0;
    if ($score == 2 || $score == 3) return 1;

    if ($cache[$score]) return $cache[$score];
    $ans = ways($score - 2) + ways($score - 3);
    $cache[$score] = $ans;
    return $ans;
}


echo ways(6);