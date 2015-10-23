<?php

class Item {
    public $weight;
    public $value;
    public function __construct($weight, $value) {
        $this->weight = $weight;
        $this->value = $value;
    }
}

function knapsack(array $inputs, $weight) {
    $V = array_fill(0, $weight + 1, 0);
    foreach($inputs AS $item) {
        for($j = $weight; $j >= $item->weight; $j --) {
            $V[$j] = max($V[$j], $V[$j - $item->weight] + $item->value);
        }
    }
    return $V[$weight];
}


$inputs = [
    new Item(20,65),
    new Item(8,35),
    new Item(60,245),
    new Item(55,195),
    new Item(40,65),
    new Item(70,150),
    new Item(85,275),
    new Item(25,155),
    new Item(30,120),
    new Item(65,320),
    new Item(75,75),
    new Item(10,40),
    new Item(95,200),
    new Item(50,100),
    new Item(40,220),
    new Item(10,99),
];

$ans = knapsack($inputs, 130);


echo $ans;