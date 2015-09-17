<?php

function findLowestCommonAncestor($tree, $val1, $val2) {
    $node = $tree->root;
    while($node) {

        if ($node->val > $val1 && $node->val > $val2) {
            $node = $node->left;
        }
        else if ($node->val < $val1 && $node->val < $val2) {
            $node = $node->right;
        }
        else {
            return $node;
        }
    }
    return null;
}