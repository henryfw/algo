<?php




function isBalanced($root) {
    if (!$root) return true;

    if (getHeight($root) == -1) {
        return false;
    }

    return true;
}

function getHeight($root) {
    if (!$root) return 0;

    $left = getHeight($root->left);
    $right = getHeight($root->right);

    if ($left == -1 || $right == -1) return -1;

    if (abs($left - $right) > 1) return -1;

    return max($left, $right) + 1;
}