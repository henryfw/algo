<?php


function bstSearch($tree, $target) {

    $root = $tree->root;

    while($root) {
        if ($root->value == $target) return $root;
        else if ($root->value < $target) $root = $root->right;
        else $root = $root->left;
    }

    return null;
}