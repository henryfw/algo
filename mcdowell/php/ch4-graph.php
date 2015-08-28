<?php


class Graph {

    public $root = null;
    public $lastNode = null;
    public $nextId = 0;

    public function add($val, $linkToLast = true) {
        $this->nextId ++;
        $node = new GraphNode($val, $this->nextId);
        if (!$this->root) {
            $this->root = $node;
        }

        if ($linkToLast) {
            $this->lastNode->next[] = $node;
        }

        $this->lastNode = $node;
        return $node;
    }

}


class GraphNode {
    public $id;
    public $val;
    public $next = [];

    public function __construct($val, $id) {
        $this->val = $val;
        $this->id = $id;
    }
}