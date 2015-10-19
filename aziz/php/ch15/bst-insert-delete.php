<?php

require "../../../mcdowell/php/ch4-binary-tree.php";


class BST {
    public $root ;

    public function insert($val) {
        if (!$this->root) $this->root = new TreeNode($val);

        $curr = $this->root;

        $parent= null;

        while ($curr) {
            $parent = $curr;
            if ($val == $curr->val) return false;
            else if ($val < $curr->val) $curr = $curr->left;
            else $curr = $curr->right;
        }


        if ($val < $parent->val) {
            $parent->left = new TreeNode($val);
        }
        else {
            $parent->right = new TreeNode($val);
        }

        return true;
    }

    public function delete($val) {
        $curr = $this->root;
        $parent = null;

        while ($curr && $curr->val != $val) {
            $parent = $curr;
            $curr = $curr->val > $val ? $curr->left : $curr->right;
        }

        if (!$curr) return false;

        if ($curr->right) {
            // min of right subtree
            $right = $curr->right;
            $rightParent = $curr;
            while($right->left) {
                $rightParent = $right;
                $right = $right->left;
            }

            $curr->val = $right->val;
            if ($rightParent->left == $right) {
                $rightParent->left = $curr->right;
            }
            else {
                $rightParent->right = $curr->right;
            }
            $right->right = null;
        }
        else {
            if ($this->root == $curr) {
                $this->root = $curr->left;
                $curr->left = null;
            }
            else {
                $parent->right = $curr->left;
            }
            $curr->left = null;
        }

        return true;

    }
}



