<?php

error_reporting(E_ALL & ~E_NOTICE);


require "../../../mcdowell/php/ch4-binary-tree.php";


/*
 * This is the same as just making a new tree and building it.
 */

function reconstructBstFromPreOrderTraverseBetter($inputs) {
    return helper($inputs, -PHP_INT_MAX, PHP_INT_MAX);
}


function helper($inputs, $low, $high, $side = "") {
    static $rootIndex = 0;

    echo "calling root: $rootIndex val: {$inputs[$rootIndex]->val}, low: $low, high: $high, side: $side\n";

    if ($rootIndex == count($inputs)) {
        echo "     null\n";
        return null;
    }

    $root = $inputs[$rootIndex];

    if ($root->val < $low || $root->val > $high) {
        echo "     null\n";
        return null;
    }

    $rootIndex ++;

    echo "  left - low: $low, high: {$root->val}\n";
    echo "  right - low: {$root->val}, high: $high\n";

    $node = new TreeNode($root->val);
    $node->left = helper($inputs, $low, $root->val, 'left');
    $node->right = helper($inputs, $root->val, $high, 'right');


    echo "     returning {$node->val}, left: {$node->left->val}, right: {$node->right->val}, side: $side\n";


    return $node;
}



// $tree is from included file
$inputs = [];
$openListLeft = [$tree->root];
$openListRight = [];
$visited = [];
while (!empty($openListLeft) || !empty($openListRight)) {
    if (!empty($openListLeft)) {
        $node = array_shift($openListLeft);
    }
    else {
        $node = array_shift($openListRight);
    }
    $inputs[] = $node;

    if ($node->left ) array_unshift($openListLeft, $node->left);
    if ($node->right) array_unshift($openListRight, $node->right);
}

//$tree->root->preOrderTranverse();



foreach($inputs AS $k => $v) {
    echo "{$v->val} ";
}

echo "\n\n";

$ans = reconstructBstFromPreOrderTraverseBetter($inputs);


echo "\n\n";

$ans->inOrderTranverse();
