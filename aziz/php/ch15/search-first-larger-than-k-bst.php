<?php

function searchBstFirstLargerK($node, $k) {
    $curr = $node;
    $ans = null;

    while ($curr) {
        if ($curr->val > $k) {
            $ans = $curr;
            $curr = $curr->left;
        }
        else {
            $curr = $curr->left;
        }
    }
    return $ans;
}

