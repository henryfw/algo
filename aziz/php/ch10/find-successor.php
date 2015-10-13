<?php

// successor is the node right after the input

function findSuccessor($tree) {
    $iter = $tree;
    if ($iter->right) {
        // find the left most element in node's right subtree
        $iter = $iter->right;
        while ($iter->left) {
            $iter = $iter->left;
        }
        return $iter;
    }

    // find the closest ancestor whose left subtree contains node
    while ($iter->parent && $iter->parent->right == $iter) $iter = $iter->parent;

    return $iter->right;
}