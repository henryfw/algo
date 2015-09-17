<?php

// preorder is DFS

// post order is backwards BFS


function preOrderTraversalWithoutRecursion($root) {
    $stack = [$root];

    while (count($stack)) {
        $current = array_pop($stack);
        echo $current->val;

        if ($current->left) {
            array_push($stack, $current->left);
        }
        if ($current->right) {
            array_push($stack, $current->right);
        }
    }
}