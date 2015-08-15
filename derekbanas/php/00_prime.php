<?php

function isPrime($n) {
    if ($n == 1 || $n == 2 || $n % 2 == 0) return false;
    for ($i = 3; $i <= (int) sqrt($n); $i ++) {
        if ($n % $i == 0) return false;
    }
    return true;
}


echo (int) isPrime(11);
echo (int) isPrime(81);