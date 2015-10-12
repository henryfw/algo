<?php

function isSymmetry($node) {
    return $node == null || checkSymmetry($node->left, $node->right);
}


function checkSymmetry($left, $right) {
    if (!$left && !$right) return true;
    if ($left && $right) {
        return $left->val == $right->val &&
            checkSymmetry($left->left, $right->right) &&
            checkSymmetry($left->right, $right->left);
    }

    return false;
}

