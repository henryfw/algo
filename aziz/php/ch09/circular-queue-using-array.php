<?php

class CircularQueue {
    protected $head = 0;
    protected $tail = 0;
    protected $entries = [];
    protected $numElements = 0;
    protected $capacity = 0;
    public function __construct($capacity) {
        $this->capacity = $capacity;
    }

    public function enqueue($val) {
        if ($this->numElements == $this->capacity) {
            $this->tail = $this->capacity;
            $this->capacity *= 2;
        }

        $this->entries[$this->tail] = $val;
        $this->numElements ++;

        $this->tail = ($this->tail + 1) % $this->capacity;
    }

    public function dequeue() {
        if ($this->numElements > 0) {
            $this->numElements --;
            $return = $this->entries[$this->head];
            $this->head = ($this->head + 1) % $this->capacity;
            return $return;
        }
        throw new Exception("Queue is empty");
    }

    public function size() {
        return $this->numElements;
    }

}



$queue = new CircularQueue(10);

$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
$queue->enqueue(4);
$queue->enqueue(5);
$queue->enqueue(6);
$queue->enqueue(7);
$queue->enqueue(8);
$queue->enqueue(9);
$queue->enqueue(10);
$queue->enqueue(11);
$queue->enqueue(12);
$queue->enqueue(13);
$queue->enqueue(14);

print_r($queue);

$queue->dequeue();

print_r($queue);