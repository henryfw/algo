<?php
require "ch4-binary-tree.php";


function findSum($node, $sum) {
    $depth = getHeight($node);
    $path = array();

    return findSumRecurse($node, $sum, $path, 0);
}


function findSumRecurse($node, $sum, &$path, $level) {

    if (!$node) return null;

    $path[$level] = $node->val;

    $t = 0;

    for ($i = $level; $i >= 0; $i --) {
        $t += $path[$i];
        if ($t == $sum) {
            recordPath($path, $i, $level);
        }
    }

    findSumRecurse($node->left, $sum, $path, $level + 1);
    findSumRecurse($node->right, $sum, $path, $level + 1);

}


function recordPath(&$path, $start, $end) {
    for ($i = $start ; $i <= $end; $i ++ ){
        echo $path[$i] . " ";
    }
    echo "\n";
}


function getHeight($node) {
    if (!$node) return 0;
    return max( [getHeight($node->left), getHeight($node->right)] ) + 1;
}

$tree->root->preOrderTranverse();
var_dump( findSum($tree->root, 60) );