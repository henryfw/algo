<?php

function createListOfLeaves($tree) {
    $leaves = [];

    if ($tree) {
        if ($tree->left == null && $tree->right == null) {
            $leaves[] = $tree;
        }
        else {
            $leaves = array_merge($leaves, createListOfLeaves($tree->left));
            $leaves = array_merge($leaves, createListOfLeaves($tree->right));
        }
    }
    return $leaves;
}