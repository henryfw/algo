<?php

// http://www.careercup.com/question?id=15290675


function allSequenceOfSumRecurse($n) {

    if ($n == 1) return [ "1" => 1 ];

    $newAns = [];
    for ($i = 1; $i < $n; $i ++) {
        $ans = allSequenceOfSumRecurse($n - $i);

        foreach ($ans AS $v => $ignore) {

            for ($j = 0; $j <= count($v); $j ++) {
                $newV = explode("-", $v);
                array_splice($newV, $j, 0, $i);
                $newAns[implode("-", $newV)] = 1;
            }
        }
    }

    return $newAns;
}


/*
function find_sum($n) {
    $array[1] = array("1");
    for ($i=2; $i <= $n; $i++) {
        $array[$i] = array();
        for ($j=1; $j < $i; $j++) {
            foreach ($array[$j] as $el) {
                array_push($array[$i], $el.",".($i-$j));
            }
        }
        array_push($array[$i], $i);
    }
    return $array[$n];
}

$n = 4;
$res = find_sum($n);

foreach ($res as $str) {
    if ($n == 1 || $str != $n)
        print "(".$str.")\n";
}
*/