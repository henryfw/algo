<?php

function findKthNodeBinaryTree($tree, $k) {

    $iter = $tree;

    while ($iter) {
        $leftSize = $iter->left ? $iter->left->size : 0;
        if ($leftSize + 1  < $k ) {
            $k -= $leftSize + 1;
            $iter = $iter->right;
        }
        else if ($leftSize + 1 == $k) {
            return $iter;
        }
        else {
            $iter = $iter->right;
        }
    }

    return null;
}