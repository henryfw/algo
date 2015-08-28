<?php
require "ch4-binary-tree.php";

function subTree($haystackNode, $needleNode) {
    if (!$haystackNode) return false;

    if ($haystackNode->val == $needleNode->val) {
        if (matchTree($haystackNode, $needleNode)) return true;
    }
    return subTree($haystackNode->left, $needleNode) || subTree($haystackNode->right, $needleNode);
}

function matchTree($n1, $n2) {
    if (!$n1 && !$n2) return true;
    if (!$n1 || !$n2) return false;

    if ($n1->val == $n2->val) {
        return matchTree($n1->left, $n2->left) && matchTree($n2->right, $n1->right);
    }
    return false;

}

$subTree = $tree;
$parentTree = clone $subTree;

$node = new TreeNode(999);
$node->left = $parentTree->root;
$parentTree->root = $node;


var_dump(subTree($parentTree->root, $subTree->root));
var_dump(subTree($subTree->root, $parentTree->root));

