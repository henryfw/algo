<?php


class HeapNode {
    public $val ;
    public $index ;
    public function __construct($index, $val) {
        $this->index = $index;
        $this->val = $val;
    }
}

class CustomMaxHeap extends SplMaxHeap {
    public function compare($a, $b) {
        return $a->val > $b->val ? 1 : -1;
    }
}

function findKthLargestBinaryHeap($inputs, $k) {
    if ($k <= 0) return [];

    $maxHeap = new CustomMaxHeap();
    $maxHeap->insert(new HeapNode(0, $inputs[0]));

    $result = [];

    for ($i = 0; $i < $k; $i ++ ) {

        $index = $maxHeap->top()->index;
        $result[] = $maxHeap->extract()->val;

        $leftIndex = $index * 2 + 1;
        if ($leftIndex < count($inputs)) {
            $maxHeap->insert(new HeapNode($leftIndex, $inputs[$leftIndex]));
        }

        $rightIndex = $index * 2 + 2;
        if ($rightIndex < count($inputs)) {
            $maxHeap->insert(new HeapNode($rightIndex, $inputs[$rightIndex]));
        }
    }

    return $result;
}


print_r(findKthLargestBinaryHeap([97, 84, 93, 83, 81, 90, 79, 83, 55, 42, 21, 73],3));