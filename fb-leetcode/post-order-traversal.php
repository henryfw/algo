<?php

function postOrderTraversalIterative($root)
{


    $ans = [];

    if ($root == null) return $ans;

    $stack = [$root];

    $prev = null;

    while(count($stack)) {
        $curr = end($stack);

        if ($prev == null || $prev->left == $curr || $prev->right == $curr) {
            if ($curr->left) {
                $stack[] = $curr->left;
            }
            else if ($curr->right)  {
                $stack[] = $curr->right;

            }
            else {
                array_pop($stack);
                $ans[] = $curr->val;
            }
        }

        else if ($curr->left == $prev) {
            if ($curr->right) {
                $stack[] = $curr->right;
            }
            else {
                array_pop($stack);
                $ans[] = $curr->val;
            }
        }
        else if ($curr->right == $prev) {
            array_pop($stack);
            $ans[] = $curr->val;
        }

        $prev = $curr;
    }

    return $ans;

}