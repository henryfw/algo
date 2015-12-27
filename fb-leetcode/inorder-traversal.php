<?php


function inOrderTraversalIterative($root) {


    $ans = [];

    if ($root == null) return $ans;

    $stack = [];

    $p = $root;

    while (count($stack) || $p) {
        if ($p) {
            // go down left
            $stack[] = $p;

            $p = $p->left;
        }

        else {
            $p = array_pop($stack);

            $ans[] = $p->val;

            $p = $p->right;
        }
    }

    return $ans;

}