<?php

function stringHash($s, $mod) {
    $prime = 997;

    $ans = 0;
    for($i = 0; $i < strlen($s); $i ++) {
        $ans = $ans * $prime + ord($s{$i});
    }
    return $ans % $mod;
}