<?php

function rotateRight($oldRoot) {
    $newRoot = $oldRoot->left;
    $oldRoot->left = $newRoot->right;
    $newRoot->right = $oldRoot;
    return $newRoot;
}