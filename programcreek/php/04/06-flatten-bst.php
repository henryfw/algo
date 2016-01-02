<?php

// Go down through the left, when right is not null, push right to stack.


function flatten($root) {
    $stack = [];

    $p = $root;

    while($p || count($stack)) {
        if ($p->right) {
            $stack[] = $p->right;
        }
        if ($p->left) {
            $p->right = $p->left;
            $p->left = null;
        }
        else if (count($stack)) {
            $t = array_pop($stack);
            $p->right = $t;
        }
        $p = $p->right;
    }
}