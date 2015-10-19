<?php
error_reporting(E_ALL & ~E_NOTICE);


require "../../../mcdowell/php/ch4-binary-tree.php";

function reconstructBstFromPreOrderTraverse($inputs) {
    return helper($inputs, 0, count($inputs));
}


function helper($inputs, $start, $end) {
    echo "calling start: $start, end: $end\n";

    if ($start >= $end) {
        return null;
    }


    $transitionPoint = $start + 1;
    while ($transitionPoint < $end && $inputs[$transitionPoint]->val < $inputs[$start]->val) {
        $transitionPoint ++;
    }

    echo "  {$inputs[$start]->val}, start: $start, trans: $transitionPoint, end: $end \n";
    $node = new TreeNode($inputs[$start]->val);
    $node->left = helper($inputs, $start + 1, $transitionPoint);
    $node->right = helper($inputs, $transitionPoint, $end);

    echo "     returning {$node->val}, left: {$node->left->val}, right: {$node->right->val}\n";
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

$ans = reconstructBstFromPreOrderTraverse($inputs);


echo "\n\n";

$ans->inOrderTranverse();