<?php
require "ch4-binary-tree.php";


class Value {
    static $last = null;
}
Value::$last = - PHP_INT_MAX;

function checkIsValidBST($node) {

    if ($node == null) return true;

    $flag = checkIsValidBST($node->left);
    if ($flag == false) return false;


    if ( $node->val < Value::$last ) return false;
    Value::$last = $node->val;

    $flag = checkIsValidBST($node->right);
    if ($flag == false) return false;

    return true;
}



var_dump( checkIsValidBST($tree->root) );

