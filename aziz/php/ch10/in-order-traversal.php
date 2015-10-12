<?php

// O(1) space
function inOrderTraverse($tree) {

    $curr = $tree;
    $result = [];
    $prev = null;

    while($curr) {
        if ($curr->parent == $prev) {
            // came down to curr from prev
            if ($curr->left) $next = $curr->left; // keep going left
            else {
                $result[] = $curr->val;

                // done with left, go right or go up
                $next = $curr->right ? $curr->right : $curr->parent;
            }

        } else if ($curr->left == $prev) {
            $result[] = $curr->val;


            // done with left, go right or go up
            $next = $curr->right ? $curr->right : $curr->parent;
        }

        $prev = $curr;
        $curr = $next;
    }

    return $result;
}