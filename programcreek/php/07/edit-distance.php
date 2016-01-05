<?php


function editDistance($word1, $word2) {
    $len1 = strlen($word1);
    $len2 = strlen($word2);

    $dp = array_fill(0, $len1 + 1, array_fill(0, $len2 + 1, 0));

    for ($i = 0; $i <= $len1; $i ++ ) {
        $dp[$i][0] = $i;
    }

    for ($j = 0; $j <= $len2; $j ++) {
        $dp[0][$j] = $j;
    }

    for ($i = 0; $i < $len1; $i ++ ) {
        $c1 = $word1{$i};

        for ($j = 0; $j < $len2; $j ++) {
            $c2 = $word2{$j};

            if ($c1 == $c2) {
                $dp[$i + 1][$j + 1] = $dp[$i][$j];
            }

            else {
                $replace = $dp[$i][$j] + 1;
                $insert = $dp[$i][$j + 1] + 1;
                $delete = $dp[$i + 1][$j] + 1;

                $min = $replace > $insert ? $insert : $replace;
                $min = $delete > $min ? $min : $delete;

                $dp[$i + 1][$j +1] = $min;
            }
        }
    }

    return $dp[$len1][$len2];
}