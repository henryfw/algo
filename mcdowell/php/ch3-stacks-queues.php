<?php

class Stack {

    public $data = array();

    public function pop() {
        return array_pop($this->data);
    }

    public function push($v) {
        return $this->data[] = $v;
    }

    public function peek() {
        return end( $this->data );
    }

}

// could also use a linkd list for faster add/remove
class Queue {

    public $data = array();

    public function enqueue($v) {
        array_push($this->data, $v);
    }
    public function dequeue() {
        return array_shift($this->data);
    }

}