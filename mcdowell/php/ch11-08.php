<?php


class Question {
    public $root = null;

    public function track($n) {
        if ($this->root == null) {
            $this->root = new RankNode($n);
        }
        else {
            $this->root->insert($n);
        }
    }

    public function getRank($n) {
        return $this->root->getRank($n);
    }
}


class RankNode {
    public $n;
    public $left;
    public $right;
    public $leftSize = 0;

    public function insert($n) {
        if ($n < $this->n) {
            if ($this->left == null) {
                $this->left = new RankNode($n);
            }
            else {
                $this->left->insert($n);
            }
            $this->leftSize ++;
        }
        else {
            if ($this->right == null) {
                $this->right = new RankNode($n);
            }
            else {
                $this->right->insert($n);
            }
        }
    }

    public function __construct($n) {
        $this->n = $n;
    }

    public function getRank($n) {
        if ($n == $this->n) {
            return $this->leftSize;
        }
        else if ($n < $this->n) {
            if ($this->left == null) return -1;
            else return $this->left->getRank($n);
        }
        else {
            if ($this->right == null) return -1;
            $rightSearch = $this->right->getRank($n);
            if ($rightSearch == -1) return -1;
            return $this->leftSize + 1 + $rightSearch;
        }
    }


}