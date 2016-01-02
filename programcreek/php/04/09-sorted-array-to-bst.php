<?php

require "../../../mcdowell/php/ch4-binary-tree.php";


class G {
    static $counter = 0;
}

function sortedArrayToBst($inputs, $left, $right) {

    G::$counter ++;

    if ($left > $right) {
        return null;
    }

    $mid = floor( ($right - $left) / 2 ) + $left;

    $root = new TreeNode($inputs[$mid]);
    $root->left = sortedArrayToBst($inputs, $left, $mid - 1);
    $root->right = sortedArrayToBst($inputs, $mid + 1, $right);

    return $root;
}

$inputs = range(0, 10000);
sortedArrayToBst($inputs, 0, count($inputs) - 1);

echo "Counter: " . G::$counter; // linear time