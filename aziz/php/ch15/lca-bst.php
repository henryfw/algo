<?php

require "../../../mcdowell/php/ch4-binary-tree.php";


// $a val < $b val
function findLowestCommonAncestorBst($root, $a, $b) {
    if ($b->val < $a->val) return findLowestCommonAncestorBst($root, $b, $a);
    $parent = $root;

    while ($parent->val < $a->val || $parent->val > $b->val) {
        while ($parent->val < $a->val) {
            $parent = $parent->right;
        }
        while ($parent->val > $b->val) {
            $parent = $parent->left;
        }
    }

    return $parent;
}