<?php


function validateBST($root) {
    if (!$root) return true;


    $q = new SplDoublyLinkedList();
    $q->push([$root, -PHP_INT_MAX, PHP_INT_MAX]);

    while($q->count() > 0) {
        list($node, $left, $right) = $q->shift();

        if ($node->val <= $left || $node->val >= $right) {
            return false;
        }
        if ($node->left) {
            $q->push([$node->left, $left, $node->val]);
        }
        if ($node->right) {
            $q->push([$node->right, $node->val, $right]);
        }
    }

    return true;
}

