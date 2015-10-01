<?php

// http://www.careercup.com/question?id=15888677


function cloneGraph(Node $root) {


    $openList = [$root];

    $newRoot = new Node($root->val);

    $map = [$root->hashCode() => $newRoot];

    while (count($openList) > 0) {
        $node = array_shift($openList);

        $newNode = $map[$node->hashCode()];

        foreach($node->children AS $child) {

            if (isset($map[$child->hashCode()])) {
                $newChild = $map[$child->hashCode()];
            }
            else {
                $newChild = new Node($child->val);
                $map[$child->hashCode()] = $newChild;
                $openList[] = $child;
            }

            $newNode->children[] = $newChild;
        }

    }

    return $newRoot;
}

class Node {
    public $children = [];
    public $val = 0;
    public function __construct($val) {
        $this->val = $val;
    }
    public function hashCode() {
        return $this->val;
    }
    public function traverse(&$visited) {
        if (isset($visited[$this->hashCode()])) return;
        $visited[$this->hashCode()] = 1;
        echo $this->val . "\n";
        foreach($this->children AS $child) {
            if (isset($visited[$child->hashCode()])) continue;
            $child->traverse($visited);
        }
    }
}


$root = new Node(0);
$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(5);
$root->children = [$node1, $node2, $node3];
$node3->children = [$node4, $node2];
$node4->children = [$node5];
$node5->children = [$root];


$newRoot = cloneGraph($root);

$visited = [];
$newRoot->traverse($visited);