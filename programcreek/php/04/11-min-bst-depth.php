<?php

// do bfs and return first leaf


function minDepth($root) {
    if (!$root) return 0;


    $nodes = [$root];
    $counts = [1];

    while (!empty($nodes)) {
        $curr = array_shift($nodes);
        $count = array_shift($counts);



        if (!$curr->left && $curr->right) {
            return $count;
        }


        if ($curr->left) {
            $nodes[] = $curr->left;
            $counts[] = $count + 1;
        }
        if ($curr->right) {
            $nodes[] = $curr->right;
            $counts[] = $count + 1;
        }

    }

    return 0;
}