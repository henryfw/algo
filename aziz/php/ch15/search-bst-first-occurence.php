<?php


function searchBstRecursive($node, $target) {

    if (!$node) return null;

    else if ($node->val == $target) {
        $tmp = searchBstRecursive($node->left, $target);
        return $tmp ? $tmp : $node;
    }

    return searchBstRecursive(
        $node->val < $target ? $node->right : $node->left , $target
    );
}


function searchBstIterative($node, $target) {
    $ans = null;

    $curr = $node;

    while($curr) {
        if ($curr->val < $target) {
            $curr = $curr->right;
        }
        else if ($curr->val > $target) {
            $curr = $curr->left;
        }
        else {
            $ans = $curr;
            $curr = $curr->left;
        }
    }

    return $ans;
}