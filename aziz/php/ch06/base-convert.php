<?php

// O(n log-b2(b1) )

function baseConvert($s, $b1, $b2) {
    $s = (string) $s;
    $neg = $s{0} == '-';

    $x = 0;

    for ($i = $neg ? 1 : 0; $i < strlen($s); $i ++) {
        $x *= $b1;
        $x += is_numeric($s{$i}) ? intval( $s{$i} ) :  ord(strtoupper($s{$i})) - ord('A') + 10;
    }

    echo $x;

    $result = [];
    do {
        $reminder = $x % $b2;
        array_unshift($result, $reminder >= 10 ? chr( ord('A') + $reminder - 10 ) : (string) $reminder);
        $x = floor($x / $b2);

    } while ($x);

    if ($neg) {
        array_unshift($result, '-');
    }

    return  ($result);
}


print_r(baseConvert('FF', 16, 10));