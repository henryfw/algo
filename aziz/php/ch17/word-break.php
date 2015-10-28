<?php


function wordBreaking($s, $dict) {

    $T = array_fill(0, strlen($s), -1) ;


    for ($i = 0; $i < strlen($s); $i ++ ) {
        if (isset($dict[substr($s, 0, $i + 1)])) {
            $T[$i] = $i + 1;
        }


        if ($T[$i] == -1) {
            for ($j = 0; $j < $i; $j ++) {
                if ($T[$j] != -1 && isset($dict[substr($s, $j + 1, $i - $j  )])) {
                    $T[$i] = $i - $j;
                    break;
                }
            }
        }
    }

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


$ans = wordBreaking('aabcedf', ['a'=>1,'abc'=>1, 'edf'=>1]);

print_r($ans);