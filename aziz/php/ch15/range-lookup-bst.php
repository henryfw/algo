<?php

function rangeLookupInBst($tree, $interval) {
    $results = [];
    helper($tree, $interval, $result);
    return $results;
}

function helper($tree, $interval, &$result) {
    if (!$tree) return ;

    if ($interval[0] <= $tree->val && $tree->val < $interval[1]) {
        // tree-> lies in the interval
        helper($tree->left, $interval, $result);
        $result[] = $tree->val;
        helper($tree->right, $interval, $result);
    }
    else if ($interval[0] > $tree->val) {
        helper($tree->right, $interval, $result);
    }
    else {
        helper($tree->left, $interval, $result);
    }
}



