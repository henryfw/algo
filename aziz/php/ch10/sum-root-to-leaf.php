<?php


function sumRootToLeaf($tree) {
    return helper($tree, 0);
}

function helper($tree, $partialPathSum) {
    if (!$tree) return 0;

    $partialPathSum = $partialPathSum * 2 + $tree->val;

    if ($tree->left == null && $tree->right == null) {
        return $partialPathSum;
    }

    return helper($tree->left, $partialPathSum) + helper($tree->right, $partialPathSum);
}