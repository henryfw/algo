<?php
// http://www.careercup.com/question?id=5632735657852928
require "../../mcdowell/php/ch4-binary-tree.php";

function isValidBST($node) {

    static $last;

    if ($node == null) return true;

    $flag = isValidBST($node->left);
    if ($flag == false) return false;


    if ( $last !== null && $node->val < $last ) return false;
    $last = $node->val;

    $flag = isValidBST($node->right);
    if ($flag == false) return false;

    return true;
}



var_dump(isValidBST($tree->root));