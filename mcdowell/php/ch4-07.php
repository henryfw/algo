<?php

require "ch4-binary-tree.php";

// with links to parents

function findCommonAncestor($a, $b) {

    if ($a == $b) return $a;
    if (!$a || !$b) return null;

    $aParents = [];

    $current = $a;
    while ($current->parent) {
        if ($current->parent == $b) return $b;

        $aParents[] = $current->parent;
        $current = $current->parent;

    }

    $current = $b;
    while ($current->parent) {
        if ($current->parent == $a) return $a;

        if (in_array( $current->parent, $aParents )) {
            return $current->parent;
        }
        $current = $current->parent;
    }

    return null;
}


function findCommonAncestorWithNoParentLinks($root, $a, $b) {
    if ($a == $b) return $a;
    if (!$a || !$b) return null;

    if (!nodeIsInDescendents($root, $a) || !nodeIsInDescendents($root, $b)) {
        return null;
    }
    return findCommonAncestorWithNoParentLinksMain($root, $a, $b);
}

function findCommonAncestorWithNoParentLinksMain($root, $a, $b) {
    if (!$root) return null;
    if ($root == $a || $root == $b) return $root;

    $aOnLeft = nodeIsInDescendents($root->left, $a);
    $bOnLeft = nodeIsInDescendents($root->left, $b);

    if ($aOnLeft != $bOnLeft) return $root;

    return helper($aOnLeft ? $root->left : $root->right, $a, $b);
}


function nodeIsInDescendents($root, $target) {
    if ($root == $target) return true;
    if (!$root) return false;
    return nodeIsInDescendents($root->left, $target) || nodeIsInDescendents($root->right, $target);
}



$tree = new BinarySearchTree();
$tree->add(100);
$tree->add(50);
$tree->add(10);
$tree->add(20);
$a = $tree->add(2);
$tree->add(200);
$tree->add(300);
$tree->add(150);
$b = $tree->add(1);

$tree->root->preOrderTranverse();

var_dump(findCommonAncestor($a, $b)->val);
var_dump(findCommonAncestorWithNoParentLinks($tree->root, $a, $b)->val);

