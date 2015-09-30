<?php

// http://www.careercup.com/question?id=15645665

class Node {
    public $val;
    public $left;
    public $right;
}


function findKthLargestInBinaryTree(Node $root, $k) {

    $counter = 0;
    $openList = [];
    $current = $root;

    while(true) {
        if ($counter != null) {
            $openList[] = $current;
            $current = $current->left;
        }
        else {
            if (count($openList)) {
                $current = array_pop($openList);

                $counter ++;
                if ($counter == $k) return $counter->val;

                $current = $current->right;
            }
            else {
                break;
            }
        }
    }

    return null;
}

