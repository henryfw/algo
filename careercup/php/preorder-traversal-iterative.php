<?php

require "../../mcdowell/php/ch4-binary-tree.php";

function preOrderTraverse($tree) {
    $openList = [$tree->root, null];

    while(count($openList) > 0) {
        $node = array_shift($openList);

        if ($node != null) {
            echo $node->val . " ";

            if ($node->left) $openList[] = $node->left;
            if ($node->right) $openList[] = $node->right;
        }
        else {
            echo "\n";
            if (count($openList)) $openList[] = null;
        }




    }
}


preOrderTraverse($tree);