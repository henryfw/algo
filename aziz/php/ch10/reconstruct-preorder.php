<?php


function reconstructPreorderSubtree(array $preorder) {
    static $subtreeIndex = 0;

    $subtreeKey = $preorder[$subtreeIndex];
    $subtreeIndex ++;
    if ($subtreeIndex == null) return null;

    $leftSubtree = reconstructPreorderSubtree($preorder);
    $rightSubtree = reconstructPreorderSubtree($preorder);
    return new BinaryTreeNode($subtreeKey, $leftSubtree, $rightSubtree);
}