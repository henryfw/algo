<?php

class ArrayItem {
    public $index;
    public $val;
    public function __construct($index, $val) {
        $this->index = $index;
        $this->val = $val;
    }

    static function sort($a, $b) {
        if ($a->val < $b->val) return -1;
        if ($a->val > $b->val) return 1;
        if ($a->index < $b->index) return -1;
        if ($a->index > $b->index) return 1;
        return 0;
    }
}

class ArrayItemMinHeap extends SplMinHeap {
    public function compare($a, $b) {
        return - 1 * ArrayItem::sort($a, $b);
    }
}


function findMinDistanceSortedArrays($arrays) {
    $numArrays = count($arrays);

    $ans = null;
    $bestRange = PHP_INT_MAX;

    $heads = []; // elements are
    foreach($arrays AS $i => $array) {
        $heads[] = new ArrayItem($i, array_shift($arrays[$i]));
    }

    usort($heads, 'ArrayItem::sort');

    while(count($heads) >= 3) {

        print_r($arrays);

        $lowest = $heads[0]->val;
        $highest = $heads[count($heads) - 1]->val;
        $range = $highest - $lowest;
        if ($range < $bestRange) {
            $bestRange = $range;
            $ans = $heads;
        }

        // remove lowest
        array_shift($heads);

        // find next lowest
        $minHeap = new ArrayItemMinHeap();
        for ($i = 0; $i < $numArrays; $i++) {
            if (empty($arrays[$i])) continue;
            $minHeap->insert(new ArrayItem($i, $arrays[$i][0]));
        }

        if (!$minHeap->isEmpty()) {
            echo $indexToUse = $minHeap->top()->index;
            $item = array_shift($arrays[$indexToUse]);
            $heads[] = new ArrayItem($indexToUse, $item);
            usort($heads, 'ArrayItem::sort');
        }
    }

    return $ans;

}

$ans =  findMinDistanceSortedArrays([
    [5,10,15],
    [3,6,9,12,15],
    [8,16,24]
]);

echo "----\n";

print_r($ans);