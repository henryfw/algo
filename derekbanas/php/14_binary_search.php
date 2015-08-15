<?php

class Node {
    public $key = null;
    /**
     * @var Node
     */
    public $left = null;
    /**
     * @var Node
     */
    public $right = null;

    public function __construct($key) {
        $this->key = $key;
    }


    public function remove($key, $parent) {
        if ($key < $this->key) {
            if ($this->left != null) {
                return $this->left->remove($key, $this);
            }
            else {
                return false;
            }
        }
        else if ($key > $this->key) {
            if ($this->right != null) {
                return $this->right->remove($key, $this);
            }
            else {
                return false;
            }
        }
        else {
            if ($this->left != null && $this->right != null) {
                $this->key = $this->right->minValue();
                $this->right->remove($this->key, $this);
            }
            else if ($parent->left == $this) {
                if ($this->left != null) {
                    $parent->left = $this->left;
                }
                else {
                    $parent->left = $this->right;
                }
            }
            else if ($parent->right == $this) {
                if ($this->left != null) {
                    $parent->right = $this->left;
                }
                else {
                    $parent->right = $this->right;
                }
            }
            return true;

        }
        return false;
    }

    public function minValue() {
        if ($this->left == null) {
            return $this->key;
        }
    }

    public function __toString() {
        return (string) $this->key;
    }

}


class BinaryTree {
    /**
     * @var Node
     */
    public $root = null;

    public function add($key) {
        $newNode = new Node($key);

        if ($this->root == null) {
            $this->root = $newNode;
        }
        else {


            $parentNode = $this->root;

            while(true) {

                $tmp = $parentNode;

                if ($key < $parentNode->key) {
                    $parentNode = $parentNode->left;

                    if ($parentNode == null) {
                        $tmp->left = $newNode;
                        return;
                    }
                }

                else {
                    $parentNode = $parentNode->right;

                    if ($parentNode == null) {
                        $tmp->right = $newNode;
                        return;
                    }
                }


            }
        }
    }

    public function remove($key) {
        if ($this->root == null) {
            return false;
        }
        else {
            if ($this->root->key == $key) {
                $tmpRoot = new Node(0);
                $tmpRoot->left = $this->root;
                $result = $this->root->remove($key, $tmpRoot);
                $this->root = $tmpRoot->left;
                return $result;
            }
            else {
                return $this->root->remove($key, null);
            }
        }
    }

    public function search($key) {

        $focusNode = $this->root;

        while (true) {

            if ($focusNode->key == $key) {
                return $key;
            }

            if ($key < $focusNode->key  ) {
                $focusNode = $focusNode->left;
            }
            else  {
                $focusNode = $focusNode->right;
            }

            if ($focusNode == null) {
                return false;
            }
        }

    }

    public function in_order_tranverse($node) {
        if ($node == null) return;
        $this->in_order_tranverse($node->left);
        echo $node->key . " ";
        $this->in_order_tranverse($node->right);

    }

    public function pre_order_tranverse($node) {
        if ($node == null) return;
        echo $node->key . " ";
        $this->in_order_tranverse($node->left);
        $this->in_order_tranverse($node->right);

    }

    public function post_order_tranverse($node) {
        if ($node == null) return;
        $this->in_order_tranverse($node->left);
        $this->in_order_tranverse($node->right);
        echo $node->key . " ";

    }
}






$inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];

$tree = new BinaryTree();

foreach($inputs AS $v) {
    $tree->add($v);
}

echo $tree->search(324) . "\n\n";

echo $tree->remove(324) . "\n\n";

$tree->in_order_tranverse($tree->root);
echo "\n\n";
