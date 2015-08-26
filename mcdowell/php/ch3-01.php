<?php

// use 1/3 of the space

class StackThree {
    public $data = array();
    public $pointers = [-1, -1, -1];
    public $individualStackSize;

    public function __construct($individualStackSize = 100) {
        $this->individualStackSize = $individualStackSize;
        $this->data = array_fill(0, $individualStackSize * 3, null);
    }

    public function push($i, $v) {
        if (!isset($this->pointers[$i])) {
            throw new Exception("Invalid stack index.");
        }
        if ($this->pointers[$i] >= $this->individualStackSize - 1) {
            throw new Exception("Stack is full.");
        }
        $this->pointers[$i] ++;
        $this->data[ $this->pointers[$i] + $i * $this->individualStackSize ] = $v;
    }

    public function pop($i) {
        if (!isset($this->pointers[$i])) {
            throw new Exception("Invalid stack index.");
        }
        if ($this->pointers[$i] <= -1) {
            return null;
        }
        $this->data[$this->pointers[$i] + $i * $this->individualStackSize] = null;
        $this->pointers[$i] --;

        return $this->data[$this->pointers[$i] + $i * $this->individualStackSize];

    }
}

$stack = new StackThree(5);
$stack->push(0, 1);
$stack->push(0, 2);
$stack->push(0, 3);


$stack->push(1, 3);
$stack->push(2, 3);

print_r($stack->data);

var_dump($stack->pop(0));
var_dump($stack->pop(1));

print_r($stack->data);