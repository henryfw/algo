<?php
require "ch4-binary-tree.php";

// inputs are sorted
function createMinHeightBinarySearchTree(array $inputs, $start, $end, $tree) {
    if ($start > $end) return;

    $mid = floor(($end + $start) / 2);
    $tree->add($inputs[$mid]);
    createMinHeightBinarySearchTree($inputs, $start, $mid - 1, $tree);
    createMinHeightBinarySearchTree($inputs, $mid + 1, $end, $tree);
}



$tree = new BinarySearchTree();
$inputs = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
createMinHeightBinarySearchTree($inputs, 0, count($inputs) - 1, $tree);


//$tree->root->preOrderTranverse();
//echo "\n\n";





// don't get a tree
function createMinBST(array $input, $start, $end) {
    if ($start > $end) return null;

    $mid = floor(($start + $end)/2);

    $node = new TreeNode($input[$mid]);
    $node->left = createMinBST($input, $start, $mid - 1);
    $node->right = createMinBST($input, $mid + 1, $end);

    return $node;
}


$root = createMinBST($inputs, 0, count($inputs) - 1);
$root->preOrderTranverse();
echo "\n\n";
