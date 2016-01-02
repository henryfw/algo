<?php

function isSymmetric($root) {


    if (!$root) return true;

    return helper($root->left, $root->right);

}


function helper($l, $r) {
    if (!$l && !$r) {
        return true;
    }
    else if (!$l || !$r) {
        return false;
    }

    if ($l->val != $r->val) return false;

    if (!helper($l->left, $r->right)) return false;
    if (!helper($l->right, $r->left)) return false;

    return true;
}




