<?php

function findKLargestInBST($node, $k) {
    $ans = [];
    helper($node, $k, $ans);
    return $ans;
}


function helper($node, $k, &$ans) {
    if ($node && count($ans) < $k) {
        helper($node->right, $k, $ans) ;

        if (count($ans)  < $k) {
            $ans[] = $node->val;
        }
        helper($node->left, $k, $ans);
    }
}