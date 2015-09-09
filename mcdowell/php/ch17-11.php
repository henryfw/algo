<?php

function rand5() {
    return rand(0,5);
}


function rand7() {

    $sum = rand5() + rand5() + rand5() + rand5() + rand5() + rand5() + rand5();

    return $sum % 7;
}

$map = [];
for($i = 0 ; $i < 20000; $i ++) {
    $map[ rand7() ] ++;
}


print_r($map);
