<?php
// http://www.careercup.com/question?id=7208176

/*
Assign a unique prime to every character. For each word,
find the product of the primes in the word and put them
in a hash table as you generate them. Duplicates are anagrams.
*/


function getAnagrams($inputs) {

    $buckets = [];

    foreach ($inputs AS $word) {
        $product = 1;
        for ($i = 0; $i < strlen($word); $i ++) {
            $product *= getPrimeValueForLetter($word{$i});
        }
        if (!isset($buckets[$product])) {
            $buckets[$product] = [];
        }
        $buckets[$product][] = $word;
    }

    $ans = [];
    foreach ($buckets AS $k => $v) {
        if (count($v) > 1) {
            $ans = array_merge($ans, $v);
        }
    }

    return $ans;
}



function getPrimeValueForLetter($letter) {
    $letter = strtoupper($letter);
    return getIthPrimeNumber(ord($letter) - ord('A') + 1);
}

print_r(getAnagrams(["abc", "cba", "ddd", "cab", "gef", "gca", "feg"]));


function getIthPrimeNumber($i) {
    $originalI = $i;
    if ($i == 1) return 2;

    static $cache = [];

    if (isset($cache[$i])) {
        return $cache[$i];
    }

    $n = 2;
    while (true) {
        $n ++;
        $sqrt = ceil( sqrt($n) );
        $ok = true;
        for ($j = 2; $j <= $sqrt; $j ++) {
//            echo "n: $n, j: $j, ans: ". ($n%$j) . "\n";
            if ($n % $j == 0) {
                $ok = false;
                break;
            }
        }
        if ($ok) {
            $i --;
            if ($i == 1) return $cache[$originalI] = $n;
        }
    }


}

var_dump(getIthPrimeNumber(2));
var_dump(getIthPrimeNumber(3));
var_dump(getIthPrimeNumber(4));
var_dump(getIthPrimeNumber(5));
var_dump(getIthPrimeNumber(6));