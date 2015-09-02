<?php

class Cache {
    public static $cache = [];
    public static $counter = 0;
}

// call stack grows at 4^n
function makeChange($amount) {

    if (isset(Cache::$cache[$amount])) {
        return Cache::$cache[$amount];
    }

    Cache::$counter ++;

    $ans = [];
    if ($amount <= 0) {
        return $ans;
    }
    else if ($amount == 1) {
        $ans = [['p' => 1]];
    }
    else {
        $ans = combineSums(makeChange($amount - 1), makeChange(1));
        if ($amount > 5) $ans = array_merge(combineSums(makeChange($amount - 5), makeChange(5)), $ans);
        if ($amount > 10) $ans = array_merge(combineSums(makeChange($amount - 10), makeChange(10)), $ans);
        if ($amount > 25) $ans = array_merge(combineSums(makeChange($amount - 25), makeChange(25)), $ans);

        if ($amount == 5) {
            $ans[] = ['n' => 1];
        }
        else if ($amount == 10) {
            $ans[] = ['d' => 1];

        }
        else if ($amount == 25) {
            $ans[] = ['q' => 1];
        }

        $ans = arrayUniqueChange($ans);
    }

    Cache::$cache[$amount] = $ans;
    return $ans;
}


function combineSums($a, $b) {
    $ans = [];
    foreach ($a AS $aItem) {
        foreach ($b AS $bItem) {
            $newAItem = $aItem;
            foreach($bItem AS $k => $v) {
                $newAItem[$k] += $v;
            }
            $ans[] = $newAItem;
        }
    }
    return $ans;
}

function arrayUniqueChange($a) {
    $ans = [];
    $done = [];
    foreach($a AS $items) {
        ksort($items);
        $hash = "";
        foreach($items AS $k => $v) {
            $hash .= "{$k}-{$v},";
        }
        if (!isset($done[$hash])) {
            $done[$hash] = 1;
            $ans[] = $items;
        }
    }
    return $ans;
}

// [ p => penny, d => dime, ... ]
//print_r(makeChange(100));
//echo "Counter " . Cache::$counter . "\n\n";


function makeChangeCountOnly($amount, $denom) {
    Cache::$counter ++;
    $nextDenom = 0;
    switch($denom) {
        case 25:
            $nextDenom = 10; break;
        case 10:
            $nextDenom = 5; break;
        case 5:
            $nextDenom = 1; break;
        case 1:
            return 1;
    }

    $ways = 0;
    for($i = 0; $i * $denom <= $amount; $i ++) {
        $ways += makeChangeCountOnly($amount - $i * $denom, $nextDenom);
    }
    return $ways;
}

Cache::$counter = 0;
print_r(makeChangeCountOnly(100, 25));
echo "\nCounter " . Cache::$counter . "\n\n";