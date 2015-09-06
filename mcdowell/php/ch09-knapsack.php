<?php

class Memo {
    static $cache = [];
    static $calls = 0;
    static function reset() {
        self::$cache = [];
        self::$calls = 0;
    }
    static function cacheKey($data, $depth = 1) {
        list($items, $weight) = $data;
        $key = $weight . '|';
        usort($items, function($a, $b) {
            return strcmp($a[0], $b[0]);
        });
        foreach($items AS $item) {
            $key .= "$item[0],";
        }
        return $key;

    }
}

/*


def total_value(items, max_weight):
    return  sum([x[2] for x in items]) if sum([x[1] for x in items]) < max_weight else 0

cache = {}
def solve(items, max_weight):
    if not items:
        return ()
    if (items,max_weight) not in cache:
        head = items[0]
        tail = items[1:]
        include = (head,) + solve(tail, max_weight - head[1])
        dont_include = solve(tail, max_weight)
        if total_value(include, max_weight) > total_value(dont_include, max_weight):
            answer = include
        else:
            answer = dont_include
        cache[(items,max_weight)] = answer
    return cache[(items,max_weight)]
 */

function totalValue($items, $maxWeight) {
    $value = 0;
    $weight = 0;
    foreach($items AS $item) {
        $value += $item[2];
        $weight += $item[1];
    }
    return $weight <= $maxWeight ? $value : 0; //   < or <= ?
}

function knapsack($items, $maxWeight) {
    if ($maxWeight <= 0) return $items;
    if (empty($items)) return [];

    $cacheKey = Memo::cacheKey([$items, $maxWeight]);

    if (! isset(Memo::$cache[$cacheKey]) ) {
        Memo::$calls ++;

        $head = $items[0];
        $tail = array_slice($items, 1);

        $weightWith = array_merge( [$head], knapsack($tail, $maxWeight - $head[1]) );
        $weightWithout = knapsack($tail, $maxWeight);
        if (totalValue($weightWith, $maxWeight) > totalValue($weightWithout, $maxWeight)) {
            $answer = $weightWith;
        }
        else {
            $answer = $weightWithout;
        }
        Memo::$cache[$cacheKey] = $answer;
    }
    return Memo::$cache[$cacheKey];
}

$items = [
    ["map", 9, 150], ["compass", 13, 35], ["water", 153, 200], ["sandwich", 50, 160],
    ["glucose", 15, 60], ["tin", 68, 45], ["banana", 27, 60], ["apple", 39, 40],
    ["cheese", 23, 30], ["beer", 52, 10], ["suntan cream", 11, 70], ["camera", 32, 30],
    ["t-shirt", 24, 15], ["trousers", 48, 10], ["umbrella", 73, 40],
    ["waterproof trousers", 42, 70], ["waterproof overclothes", 43, 75],
    ["note-case", 22, 80], ["sunglasses", 7, 20], ["towel", 18, 12],
    ["socks", 4, 50], ["book", 30, 10]
];

/**, ["banana", 27, 60], ["apple", 39, 40],
["cheese", 23, 30], ["beer", 52, 10], ["suntan cream", 11, 70], ["camera", 32, 30],
["t-shirt", 24, 15], ["trousers", 48, 10], ["umbrella", 73, 40],
["waterproof trousers", 42, 70], ["waterproof overclothes", 43, 75],
["note-case", 22, 80], ["sunglasses", 7, 20], ["towel", 18, 12],
["socks", 4, 50], ["book", 30, 10]**/

//print_r( array_merge( [$items[0]] , array_slice($items, 3,2) ));

$maxWeight = 400;
$result = knapsack($items, $maxWeight);
print_r($result);
echo "value: " . totalValue($result, $maxWeight) . " (calls " . Memo::$calls . ")\n\n";








function knapsackWeightOnly($weights, $values, $i, $weightLeft) {
    if (isset(Memo::$cache[$i][$weightLeft])) {
        return Memo::$cache[$i][$weightLeft];
    }
    Memo::$calls ++;

    if ($i == 0) {
        if ($weights[$i] <= $weightLeft) {
            return $values[$i];
        }
        else {
            return 0;
        }
    }

    $withoutIndex = knapsackWeightOnly($weights, $values, $i - 1, $weightLeft);
    if ($weights[$i] > $weightLeft) {
        return $withoutIndex;
    }
    else {
        $withIndex = $weights[$i] + knapsackWeightOnly($weights, $values, $i - 1, $weightLeft - $weights[$i]);
        $result = max($withoutIndex, $withIndex);
        Memo::$cache[$i][$weightLeft] = $result;
        return $result;
    }
}



Memo::reset();
$w3 = array(1, 1, 1, 2, 2, 2, 4, 4, 4, 44, 96, 96, 96);
$v3 = array(1, 1, 1, 2, 2, 2, 4, 4, 4, 44, 96, 96, 96);
$m3 = knapsackWeightOnly($w3, $v3, sizeof($v3) -1, 54 );
//echo "Max: $m3 (". Memo::$calls . " calls)\n";