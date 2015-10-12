<?php

require "../../../mcdowell/php/ch4-binary-tree.php";

function bstIterativeInOrder(BinarySearchTree $tree) {
    $s = [];

    $curr = $tree->root;
    $result = [];

    while (!empty($s) || $curr != null) {
        // go left
        if ($curr != null) {
            array_unshift($s, $curr) ;
            $curr = $curr->left;
        }
        // go up
        else {
            $curr = array_shift($s);
            $result[] = $curr->val;
            $curr = $curr->right;
        }
    }

    return $result;
}


$ans = bstIterativeInOrder($tree);
print_r($ans);