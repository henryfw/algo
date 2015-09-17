<?php

// running time O(n)

function getHeight($node) {
    if (!$node) return 0;

    return max(getHeight($node->left), getHeight($node->right)) + 1;
}