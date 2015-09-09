<?php

function countTwoBrute($n) {
    $count = 0;
    for($i = 2 ; $i <= $n; $i ++ ) {
        $x = $i;
        while($x > 1) {
            if ($x % 10 == 2) $count++;
            $x = floor($x / 10);
        }

    }
    return $count;
}



var_dump(countTwoBrute(22));