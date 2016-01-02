<?php

require "../../../mcdowell/php/ch4-binary-tree.php";


function inorder($root) {
    $ans = [];

    if (!$root) return $ans;

    $stack = [];

    $p = $root;

    while (count($stack) || $p) {

        // if it is not null, push to stack
        //and go down the tree to left
        if ($p) {
            $stack[] = $p;
            $p = $p->left;
        }

        // if no left child
        // pop stack, process the node
        // then let p point to the right
        else {
            $n = array_pop($stack) ;
            $ans[] = $n->val;
            $p = $n->right;
        }
    }


    return $ans;
}


print_r(inorder($tree->root));