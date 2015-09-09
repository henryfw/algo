<?php

class BiNode {
    public $value;
    public $node1;
    public $node2;
    public function __construct($value) {
        $this->value = $value;
    }
}


class LinkedListFragment {
    public $head;
    public $tail;
    public function __construct($head, $tail) {
        $this->head = $head;
        $this->tail = $tail;
    }
}

function convert($root) {
    if (!$root) return null;

    $part1 = convert($root->node1);
    $part2 = convert($root->node2);

    if ($part1 != null) {
        concat($part1->tail, $root);
    }
    if ($part2 != null) {
        concat($root, $part2->head);
    }

    return new LinkedListFragment(
        $part1 == null ? $root : $part1->head,
        $part2 == null ? $root : $part2->tail
    );
}


function concat($n1, $n2) {
    $n1->node2 = $n2;
    $n2->node1 = $n1;
}


// build a tree
$root = new BiNode(4);
$root->node1 = new BiNode(2);
$root->node2 = new BiNode(6);

$root->node1->node1 = new BiNode(1);
$root->node1->node2 = new BiNode(3);

$root->node2->node1 = new BiNode(5);
$root->node2->node2 = new BiNode(7);


$linkedList = convert($root);

$current = $linkedList->head;
while($current) {
    echo $current->value . "\n";
    $current = $current->node2;

}
