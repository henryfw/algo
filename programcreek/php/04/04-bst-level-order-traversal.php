<?php

function levelOrder($root) {
    $ans = [];
    $nodeValues = [];

    if (!$root) return $ans;

    $current = [$root];
    $next = [];

    while(count($current)) {
        $node = array_pop($current);

        if ($node->left) $next[] = $node->left;
        if ($node->right) $next[] = $node->right;

        $nodeValues[] = $node->val;

        if (empty($current)) {
            $current = $next;
            $next = [];
            $ans[] = $nodeValues;
            $nodeValues = [];
        }
    }

    return $ans;
}