<?php

class QueueWithMax {
    protected  $entries = [];
    protected  $maxEntries = [];

    public function enqueue($x) {
        $this->entries[] = $x;
        while (!empty($this->maxEntries)) {
            if ($this->maxEntries[count($this->maxEntries) - 1] >= $x) {
                break;
            }
            else {
                array_pop($this->maxEntries);
            }
        }
        $this->maxEntries[] = $x;
        print_r($this->maxEntries);
    }

    public function dequeue() {
        if (!empty($this->entries)) {
            $result = array_shift($this->entries);
            if ($result == $this->maxEntries[0]) {
                array_shift($this->maxEntries);
            }
            return $result;
        }
        throw new Exception("Empty.");
    }

    public function max() {
        if (!empty($this->maxEntries)) {
            return $this->maxEntries[0];
        }
        throw new Exception("Empty.");
    }
}


$queue = new QueueWithMax();
$queue->enqueue(9);
$queue->enqueue(99);
$queue->enqueue(50);
$queue->enqueue(60);
$queue->enqueue(10);

assert($queue->max() == 99);
assert($queue->dequeue() == 9);
assert($queue->dequeue() == 99);
assert($queue->max() == 60);