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

    }
}


class RankNode {
    public $n;
    public $left;
    public $right;
    public $leftSize = 0;

    public function insert($n) {

    }

    public function __construct($n) {
        $this->n = $n;
    }


}