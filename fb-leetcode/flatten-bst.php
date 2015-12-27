<?php



function flattenBst($root) {
    $stack = [];

    $p = $root;

    while ($p || count($stack)) {
        if ($p->right) {
            $stack[] = $p->right;
        }

        if ($p->left) {
            $p->right = $p->left;
            $p->left = null;
        }
        else if (count($stack)) {
            $temp = array_pop($stack);
            $p->right = $temp;
        }

        $p = $p->right;
    }
}