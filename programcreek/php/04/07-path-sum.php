<?php

function hasPathToSum($root, $target) {
    if (!$root) return false;

    $nodes = [$root];
    $sums = [$root->val];

    while(count($nodes) > 0) {
        $curr = array_shift($nodes);
        $sum = array_shift($sums);

        if (!$curr->left && !$curr->right && $sum == $target) return true;

        if ($curr->left) {
            $nodes[] = $curr->left;
            $sums[] = $sum + $curr->left->val;
        }

        if ($curr->right) {
            $nodes[] = $curr->right;
            $sums[] = $sum + $curr->right->val;
        }
    }

    return false;
}


