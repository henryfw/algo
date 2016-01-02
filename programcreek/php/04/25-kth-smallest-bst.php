<?php
require "../../../mcdowell/php/ch4-binary-tree.php";


function kthSmallest($root, $k) {
    $stack = new SplDoublyLinkedList();

    $p = $root;
    $ans = [];

    while ($p || $stack->count()) {

        if ($p) {
            $stack->push($p);
            $p = $p->left;
        }
        else {
            $curr = $stack->pop();
            $ans[] = $curr->val;
            $k --;
            if ($k == 0) break;
            $p = $p->right;
        }
    }

    return $ans;
}

print_r(kthSmallest($tree->root, 2));



function kthBiggest($root, $k) {

    $stack = new SplDoublyLinkedList();

    $p = $root;

    $ans = [];

    while ($p || $stack->count()) {
        if ($p) {
            $stack->push($p);
            $p = $p->right;
        }
        else {
            $curr = $stack->pop();
            $ans[] = $curr->val;
            $k --;
            if ($k == 0) break;
            $p = $p->left;
        }
    }

    return $ans;
}

print_r(kthBiggest($tree->root, 2));
