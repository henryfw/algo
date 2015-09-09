<?php

function add($a, $b){

    echo "\$a " .decbin($a). ", \$b " . decbin($b) . "\n";

    if ($b == 0) return $a;

    $sum = $a ^ $b;
    $carry = ($a & $b) << 1;

    return add($sum, $carry);
}



