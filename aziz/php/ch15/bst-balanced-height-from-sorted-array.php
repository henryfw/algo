<?php

require "../../../mcdowell/php/ch4-binary-tree.php";



function buildMinHeightBSTFromSortedArray($inputs)
{
    return helper($inputs, 0, count($inputs));
}

function helper($inputs, $start, $end) {

    if ($start >= $end) return null;

    $mid = $start + floor(($end - $start) / 2);

    echo "adding index $mid with val {$inputs[$mid]} \n";

    $node = new TreeNode($inputs[$mid]);
    $node->left = helper($inputs, $start, $mid);
    $node->right = helper($inputs, $mid + 1, $end);
    return $node;
}

$inputs = [1,2,3,4,5,6,7,8,9];

$ans = buildMinHeightBSTFromSortedArray($inputs);


$ans->inOrderTranverse();

echo "\n\n";

$ans->preOrderTranverse();