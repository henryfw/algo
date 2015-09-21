<?php

//http://www.careercup.com/question?id=65732

function getSequences($inputs) {
    $queueByValue = new SplPriorityQueue();

    foreach($inputs AS $k => $v) {
        $queueByValue->insert(new Node($k, $v), $v);
    }

    $results = [];
    $queueByIndex = new SplPriorityQueue();
    $lastNode = null;

    while(!$queueByValue->isEmpty()) {
        $currentNode = $queueByValue->extract();

        if ($currentNode->val == $lastNode->val - 1 || $lastNode === null) {
            $queueByIndex->insert($currentNode, $currentNode->index);
        }
        else {
            if ($queueByIndex->count() > 1) {
                $ans = [];
                while(!$queueByIndex->isEmpty()) array_unshift($ans, $queueByIndex->extract()->val);
                $results[] = $ans;
            }
            $queueByIndex = new SplPriorityQueue();
            $queueByIndex->insert($currentNode, $currentNode->index);
        }
        $lastNode = $currentNode;
    }
    if ($queueByIndex->count() > 1) {
        $ans = [];
        while(!$queueByIndex->isEmpty()) array_unshift($ans, $queueByIndex->extract()->val);
        $results[] = $ans;
    }
    return $results;

}

class Node {
    public $val;
    public $index;
    public function __construct($index, $val) {
        $this->val = $val;
        $this->index = $index;
    }
}

$inputs = [8,2,4,7,1,0,3,6];
print_r(getSequences($inputs));