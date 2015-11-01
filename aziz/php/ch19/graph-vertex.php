<?php



class GraphVertex {
    const WHITE = '1'; // unvisited
    const BLACK = '2'; // no cycle
    const GRAY = '3'; // cur
    public $color = self::WHITE;
    public $label = '';
    public $edges = [];
    public function __construct($label, $edges = null) {
        $this->label = $label;
        if (is_array($edges)) $this->edges = array_merge($this->edges, $edges);
    }
    public function addEdge(GraphVertex $e) {
        $this->edges[] = $e;
    }
    public function hashKey() {
        return $this->label;
    }
}