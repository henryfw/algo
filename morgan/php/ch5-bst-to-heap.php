<?php


function heapifyBinaryTree($root) {

    $nodeArray = [];

    preOrderTraverse($root, $nodeArray);

    echo "before sort: ";
    foreach($nodeArray AS $v) {
        echo "{$v->val} ";
    }
    usort($nodeArray, function($a, $b) {
        if ($a->val < $b->val) {
            return -1;
        }
        else if ($a->val == $b->val) {
            return 0;
        }
        else {
            return 1;
        }
    });

    return $nodeArray;
}

function preOrderTraverse($node, &$nodeArray) {
    if ($node == null) {
        return;
    }

    $nodeArray[] = $node;

    preOrderTraverse($node->left, $nodeArray);
    preOrderTraverse($node->right, $nodeArray);
}



class Node {
    public $left;
    public $right;
    public $val;
    public function __construct($val) {
        $this->val = $val;
    }
}

$head = new Node(100);
$head->left = new Node(50);
$head->left->left = new Node(25);
$head->left->right = new Node(75);
$head->right = new Node(200);
$head->right->left = new Node(150);
$head->right->right = new Node(300);



$a = heapifyBinaryTree($head);
echo "\n\nresult: ";
foreach($a AS $v) {
    echo "{$v->val} ";
}