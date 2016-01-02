<?php


function lca($root, $p, $q) {
    if ($root->val > $p->val && $root->val > $q->val) {
        return lca($root->left, $p, $q);
    }
    else if ($root->val < $p->val && $root->val < $q->val) {
        return lca($root->right, $p, $q);
    }

    return $root;

}