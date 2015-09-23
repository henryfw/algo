<?php

// http://www.careercup.com/question?id=5156120807079936

class BiNode {
    public $value;
    public $left;
    public $right;
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

    $newHead = null;
    $newTail = null;

    $fragLeft = convert($root->left);
    if ($fragLeft) {
        concat($fragLeft->tail, $root);
    }

    $fragRight = convert($root->right);
    if ($fragRight) {
        concat($root, $fragRight->head);
    }

    return new LinkedListFragment($fragLeft ? $fragLeft->head : $root,
        $fragRight ? $fragRight->tail : $root);
}


function concat($a, $b) {
    $a->right = $b;
    $b->left = $a;
}


// build a tree
$root = new BiNode(4);
$root->left = new BiNode(2);
$root->right = new BiNode(6);

$root->left->left = new BiNode(1);
$root->left->right = new BiNode(3);

$root->right->left = new BiNode(5);
$root->right->right = new BiNode(7);


$linkedList = convert($root);

$current = $linkedList->head;
while($current) {
    echo $current->value . "\n";
    $current = $current->right;

}
