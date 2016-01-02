<?php

function preorder($root) {
    $ans = [];

    if (!$root) return $ans;

    $stack = [$root];

    while (count($stack)) {
        $n = array_pop($stack);
        $ans[] = $n;

        if ($n->right) $stack[] = $n->right;
        if ($n->left) $stack[] = $n->left;
    }

    return $ans;

}