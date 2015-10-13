<?php


function constructRightSibling($tree) {
    $leftStart = $tree;

    while($leftStart && $leftStart->left) {
        populateLowerLevelNextField($leftStart);
        $leftStart = $leftStart->left;
    }

}


function populateLowerLevelNextField($startNode) {
    $iter = $startNode;

    while($iter) {
        $iter->left->next = $iter->right;

        if ($iter->next) {
            $iter->right->next = $iter->next->left;
        }
        $iter = $iter->next;
    }
}