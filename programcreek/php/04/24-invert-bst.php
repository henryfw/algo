<?php


function invertTree($root) {
    $q = new SplDoublyLinkedList();

    if (!$root) return null;

    $q->push($root);

    while($q->count()) {
        $curr = $q->shift();

        if ($curr->left) {
            $q->push($curr->left);
        }
        if ($curr->right) {
            $q->push($curr->right);
        }

        $temp = $curr->left;
        $curr->left = $curr->right;
        $curr->right = $temp;


    }

    return $root;
}