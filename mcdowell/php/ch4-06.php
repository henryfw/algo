<?php
require "ch4-binary-tree.php";

class BinarySearchTreeWithInOrderSuccessor extends BinarySearchTree {
    public function add($val) {
        $node = new TreeNodeInOrderSuccessor($val);
        return $this->addNode($node);
    }
}

class TreeNodeInOrderSuccessor extends TreeNode {

    public function findInOrderSuccessor() {
        if ($this->right != null) {
            return $this->right->getMinNode();
        }
        else {
            $current = $this;
            $parent = $this->parent;

            while ($current && $parent->left != $current) {
                $current = $parent;
                $parent = $parent->parent;
            }

            return $current;
        }
    }

    public function getMinNode() {

        if ($this->left != null) {
            return $this->getMinNode($this->left);
        }

        return $this;
    }
}

$tree = new BinarySearchTreeWithInOrderSuccessor();
$tree->add(100);
$tree->add(50);
$y = $tree->add(10);
$tree->add(20);
$tree->add(2);
$x = $tree->add(200);
$tree->add(300);
$tree->add(150);



var_dump($y->findInOrderSuccessor()->val);
var_dump($x->findInOrderSuccessor()->val);

