<?php


function hasSpecificSumRootToLeaf($tree, $target) {
    return helper($tree, 0, $target);
}

function helper($tree, $partialPathSum, $target) {
    if (!$tree) return false;

    $partialPathSum += $tree->val;

    if ($tree->left == null && $tree->right == null) {
        return $partialPathSum == $target;
    }

    return helper($tree->left, $partialPathSum, $target) ||
        helper($tree->right, $partialPathSum, $target);
}