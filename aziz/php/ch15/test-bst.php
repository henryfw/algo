<?php

function isBst($node) {
    return areKeysInRange($node, - PHP_INT_MAX, PHP_INT_MAX) ;
}


function areKeysInRange($node, $low, $high) {
    if (!$node) return true;

    else if ($node->val < $low || $node->val > $high) return false;

    return areKeysInRange($node->left, $low, $node->val) &&
        areKeysInRange($node->right, $node->val, $high);
}