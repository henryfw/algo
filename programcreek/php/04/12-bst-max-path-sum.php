<?php

function maxPathSum($root) {
    $max = -PHP_INT_MAX;
    calcSum($root, $max);
    return $max;
}


function calcSum($root, &$max) {
    if (!$root) return null;

    $left = calcSum($root->left, $max);
    $right = calcSum($root->right, $max);

    $current = max($root->val, $root->val + $left);
    $current = max($current, $root->val + $right);
    $current = max($current, $left + $right + $root->val);

    $max = max($max, $current);

    return $current;
}