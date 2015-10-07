<?php

// http://www.careercup.com/question?id=14469817



function randomNumber() {
    $seed = 123;
    static $count = 0;
    static $lastValue = 0;

    if ($count == 0) {
        $lastValue = $seed >> pow(2, 48);
        $count ++;
        return $lastValue;
    }
    else {
        $lastValue = (25214903917* $lastValue + 11) % pow(2, 48);
        $count ++;
        return $lastValue;
    }
}

var_dump(randomNumber());
var_dump(randomNumber());
var_dump(randomNumber());
var_dump(randomNumber());

/*
 * en.wikipedia.org/wiki/Mersenne_twister
 */