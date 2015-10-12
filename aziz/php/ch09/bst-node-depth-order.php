<?php

require "../../../mcdowell/php/ch4-binary-tree.php";

function bstTreeDepthOrder(BinarySearchTree $tree) {
    $processingNodes = new SplQueue();
    $processingNodes->enqueue($tree->root);

    $numNodesToProcessAtCurrentLevel = $processingNodes->count();

    $result = [];
    $oneLevel = [];

    while ($processingNodes->isEmpty() == false) {
        $curr = $processingNodes->dequeue();
        -- $numNodesToProcessAtCurrentLevel;
        if ($curr) {
            $oneLevel[] = $curr->val;
        }

        $processingNodes->enqueue($curr->left);
        $processingNodes->enqueue($curr->right);

        if ($numNodesToProcessAtCurrentLevel == 0) {
            $numNodesToProcessAtCurrentLevel = $processingNodes->count();

            if (!empty($oneLevel)) {
                $result[] = $oneLevel;
                $oneLevel = [];
            }
        }
    }


    return $result;
}