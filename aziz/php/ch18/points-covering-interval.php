<?php

class Interval {
    public $left;
    public $right;
    protected $hash = null;
    public function __construct($l, $r) {
        $this->left = $l;
        $this->right = $r;
        $this->hash = uniqid(rand()) ;
    }
    public function hashKey() {
        return $this->hash;
    }
    public static  function compare($a, $b) {
        if ($a->left != $b->left) return $a->left > $b->left ? 1 : -1;
        if ($a->right == $b->right) return 0;
        return $a->right > $b->right ? 1 : -1;
    }
}

function findMinimumVisits($inputs) {
    $left = [];
    $right = [];

    foreach($inputs AS $i) {
        $left[$i->hashKey()] = $i;
        $right[$i->hashKey()] = $i;
    }

    uasort($left, 'Interval::compare');
    uasort($right, 'Interval::compare');

    $ans = [];

    while (!empty($left) && !empty($right)) {
        $b = reset($right)->right;
        $ans[] = $b;

        while(!empty($left)) {
            $interval = reset($left);
            if ($interval->left > $b) {
                break;
            }
            unset($left[$interval->hashKey()]);
            unset($right[$interval->hashKey()]);
        }
    }
    return $ans;
}


$inputs = [
    new Interval(1,2),
    new Interval(2,3),
    new Interval(2,3),
    new Interval(3,4),
    new Interval(3,4),
    new Interval(4,5),
];

$ans = findMinimumVisits($inputs);

print_r($ans);

