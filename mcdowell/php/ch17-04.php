<?php

function flip($i) {
    return 1 ^ $i;
}

function sign($i) {
    return  flip( ($i >> 63) & 1);
}


function getMax($a, $b) {
    $k = sign($a - $b);
    $q = flip($k);
    return $a *$k + $b * $q;


}


echo getMax(20, 21);