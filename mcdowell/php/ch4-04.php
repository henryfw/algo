<?php
require "ch4-binary-tree.php";




function createLevelLinkedList($node, &$lists, $level) {
    if (!$node) return;

    $list = null;
    if (count($lists) < $level + 1) {
        $list = array();
        $lists[] = &$list;
    }
    else {
        $list = &$lists[$level];
    }

    $list[] = $node->val;
    createLevelLinkedList($node->left, $lists, $level + 1);
    createLevelLinkedList($node->right, $lists, $level + 1);
}



$lists = array();
createLevelLinkedList($tree->root, $lists, 0);
print_r($lists);




function createLeveLinkedListBFS($tree) {

    $ans = [];

    $current = [$tree->root];

    while (count($current)) {

        $ans[] = $current;

        $parents = $current;

        $current = [];

        foreach ($parents AS $parent) {
            if ($parent->left) $current[] = $parent->left;
            if ($parent->right) $current[] = $parent->right;
        }

    }

    return $ans;

}


$lists = array();
createLevelLinkedList($tree->root, $lists, 0);
print_r($lists);
