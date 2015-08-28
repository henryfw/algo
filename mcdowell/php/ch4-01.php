<?php

require "ch4-binary-tree.php";

function isBalanced($node) {
    if ($node == null) return true;
    
    $diff = getHeight($node->left) - getHeight($node->right);


    // base case

    if (abs($diff) > 1) {
        return false;
    }
    else {
        return isBalanced($node->left) && isBalanced($node->right);
    }
    

}

function getHeight($root) {
    if ($root == null) return 0;
    return max( [ getHeight($root->left), getHeight($root->right) ] ) + 1 ;
}



function isBalanced2($node) {
    if (!$node) return true;

    $diff = abs(getHeight2($node->left) - getHeight2($node->right));
    if ($diff > 1) return false;

    return isBalanced($node->left) && isBalanced($node->right);
}

function getHeight2($node) {
    if (!$node) return 0;
    return max( getHeight2($node->left) , getHeight2($node->right) ) + 1;
}



function isBalancedLinearTime($node) {
    return checkHeight($node) != -1;
}

function checkHeight($node) {
    if (!$node) return 0;

    // check if left is balance
    $leftHeight = checkHeight($node->left);
    if ($leftHeight == -1) return -1;

    $rightHeight = checkHeight($node->right);
    if ($rightHeight == -1) return -1;

    $diff = abs($leftHeight - $rightHeight);

    if ($diff > 1) return -1;

    return max($leftHeight, $rightHeight) + 1;
}


echo (int) isBalancedLinearTime($tree->root);


