<?php

// up to n
function generatePrimes($n) {
    $primes = [];
    $isPrime = array_fill(0, $n + 1, true);
    $isPrime[0] = $isPrime[1] = true;

    for ($i = 2; $i < $n; $i ++) {
        if ($isPrime[$i]) {
            $primes[] = $i;
            for ($j = $i; $j < $n; $j += $i) {
                $isPrime[$j] = false;
            }
        }
    }

    return $primes;
}



print_r(generatePrimes(100));