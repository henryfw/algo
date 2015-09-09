<?php

function shortestDistance($words, $word1, $word2) {
    $last1 = -1;
    $last2 = -1;
    $minDist = -1;

    for ($i = 0, $ii = count($words); $i < $ii; $i ++) {
        if ($words[$i] == $word1) {
            $last1 = $i;
            // check last word2
            if ($last2 != -1) {
                $dist = $i - $last2;
                if ($dist < $minDist || $minDist == -1) $minDist = $dist;
            }
        }
        else if ($words[$i] == $word2) {
            $last2 = $i;
            if ($last1 != -1) {
                $dist = $i - $last1;
                if ($dist < $minDist || $minDist == -1) $minDist = $dist;
            }
        }
    }

    return $minDist;
}


echo shortestDistance([
    'z', 'abc', 'a', 'b', 'c', 'd', 'efg', 'z', 'abc', 'a', 'c'
], 'abc', 'c');