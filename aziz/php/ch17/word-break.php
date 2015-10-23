<?php

// this books sucks at explaining DP.
// https://www.youtube.com/watch?v=WepWFGxiwRs&index=17&list=PLrmLmBdmIlpsHaNTPP_jHHDx_os9ItYXr
// skip and watch youtube videos

function wordBreaking($s, $dict) {

    $T = array_fill(0, strlen($s), -1) ;


    for ($i = 0; $i < strlen($s); $i ++ ) {
        if (isset($dict[substr($s, 0, $i + 1)])) {
            $T[$i] = $i + 1;
        }


        if ($T[$i] == -1) {
            for ($j = 0; $j < $i; $j ++) {
                if ($T[$j] != -1 && isset($dict[substr($j + 1, $i - $j)])) {
                    $T[$i] = $i - $j;
                    break;
                }
            }
        }

        print_r($T);
        $ret = [];
        if (end($T) != -1) {
            $index = strlen($s) -1;
            while ($index >= 0) {
                $ret[] = substr($s, $index + 1 - $T[$index], $index + 1);
                $index -= $T[$index];
            }
            array_reverse($ret);
        }

        return $ret;
    }
}


$ans = wordBreaking("iamace", ['i' => 1, 'am' => 1, 'ace' => 1]);

print_r($ans);