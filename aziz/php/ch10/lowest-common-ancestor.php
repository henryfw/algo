<?php

function getHeight($node) {
    $height = 0;
    while($node) {
        $node = $node->parent;
        $height ++;
    }
    return $height;
}

function getLowestCommonAncestor($left, $right) {
    if (!$left || !$right) throw new Exception("Node cannot be null.");

    $leftHeight = getHeight($left);
    $rightHeight = getHeight($right);


    while ($leftHeight > $rightHeight) {
        $left = $left->parent;
        $leftHeight --;
    }
    while ($rightHeight > $leftHeight) {
        $right = $right->parent;
        $rightHeight --;
    }

    while ($left->parent != $right->parent) {
        $left = $left->parent;
        $right = $right->parent;
    }

    return $left->parent;

}