<?php

// keep combining random bits for 2^n - 1 bits. rerun if gone over interval

function uniformRandom($a, $b) {
    if ($a > $b) return uniformRandom($b, $a);
    if ($a == $b) return $a;

    $interval = $b - $a + 1;
    do {
        $result = 0;
        for ($i = 0; (1 << $i) < $interval; $i ++) {
            $result = ($result << 1) | randOneZero();
            echo "1<<i: " . (1 << $i ) . ", result: $result\n";
        }
    } while ($result >= $interval);

    return $result + $a;
}


function randOneZero() {
    return rand(0,1);
}



print uniformRandom(10,100);