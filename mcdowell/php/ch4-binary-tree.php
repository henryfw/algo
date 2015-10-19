<?php

interface BinaryTree {
    public function add($val);
}

class BinarySearchTree implements BinaryTree {

    public $root = null;

    public function addNode($node) {
        if ($this->root == null) {
            $this->root = $node;
        }
        else {
            $pointer = $this->root;
            $useLeft = null;
            $lastPointer = null;
            while ($pointer != null) {
                $lastPointer = $pointer;

                if ($node->val <= $pointer->val) {
                    $useLeft = 1;
                    $pointer = $pointer->left;
                }
                else {
                    $useLeft = 0;
                    $pointer = $pointer->right;
                }

            }

            $node->parent = $lastPointer;
            if ($useLeft) {
                $lastPointer->left = $node;
            }
            else {
                $lastPointer->right = $node;
            }
        }
        return $node;
    }

    public function add($val) {
        $node = new TreeNode($val);
        $this->addNode($node);
        return $node;
    }

    public function remove($val) {

        // do some kind of rotation
        $pointer = $this->root;

        while( $pointer != null) {

            if ($pointer->val == $val) {
                if ($pointer->right) {
                    // find rightmost
                    $replacementNode = $this->findMinNode($pointer->right);
                    $pointer->val = $replacementNode->val;
                    if ($replacementNode->parent->left == $replacementNode) {
                        $replacementNode->parent->left = $pointer->right;
                    }
                    else if ($replacementNode->parent->right == $replacementNode) {
                        $replacementNode->parent->right = $pointer->right;
                    }
                }
                else {
                    if ($pointer == $this->root) {
                        $this->root = $pointer->left;
                    }
                    else {
                        if ($pointer->left) {
                            if ($pointer->parent->left == $pointer) {
                                $pointer->parent->left = $pointer->left;
                            }
                            else if ($pointer->parent->right == $pointer) {
                                $pointer->parent->right = $pointer->left;
                            }
                            $pointer->left->parent = $pointer->parent;
                        }
                        else {
                            if ($pointer->parent->left == $pointer) {
                                $pointer->parent->left = null;
                            }
                            else if ($pointer->parent->right == $pointer) {
                                $pointer->parent->right = null;
                            }
                        }
                    }
                }
                return true;
            }
            else if ($val <= $pointer->val) {
                $pointer = $pointer->left;
            }
            else {
                $pointer = $pointer->right;
            }
        }
        return false;
    }

    public function findMinNode($node) {
        while ($node->left) {
            $node = $node->left;
        }
        return $node;
    }

}


class TreeNode {
    public $val;
    public $left;
    public $right;
    public $parent;

    public function __construct($val) {
        $this->val = $val;
    }

    public function inOrderTranverse() {
        if ($this->left) $this->left->inOrderTranverse();
        echo $this->val . ' ';
        if ($this->right) $this->right->inOrderTranverse();
    }

    public function preOrderTranverse() {
        echo "val: {$this->val}, left: {$this->left}, right: {$this->right}\n";
        if ($this->left) $this->left->preOrderTranverse();
        if ($this->right) $this->right->preOrderTranverse();
    }
    public function postOrderTranverse() {
        if ($this->left) $this->left->postOrderTranverse();
        if ($this->right) $this->right->postOrderTranverse();
        echo $this->val . ' ';
    }
    public function __toString() {
        return (string) $this->val;
    }


}


$tree = new BinarySearchTree();
$tree->add(100);
$tree->add(50);
$tree->add(10);
$tree->add(20);
$tree->add(2);
$tree->add(200);
$tree->add(300);
$tree->add(150);


//echo "Root: {$tree->root->val}\n\n";
//$tree->root->inOrderTranverse();
//echo "\n\n";
//$tree->root->preOrderTranverse();
//echo "\n\n";
//$tree->root->postOrderTranverse();
//echo "\n\n";

//var_dump( $tree->remove(20) );
//$tree->root->inOrderTranverse();
//echo "\n\n";

//var_dump( $tree->remove(100) );
//$tree->root->inOrderTranverse();
//echo "\n\n";
