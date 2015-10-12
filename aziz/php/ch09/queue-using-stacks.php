<?php

class QueueUsingStacks {
    protected $enq = [];
    protected $deq = [];

    public function enqueue($x) {
        $this->enq[] = $x;

    }

    public function dequeue() {
        if (empty($this->deq)) {
            while (!empty($this->enq)) {
                $this->deq[] = array_pop($this->enq);
            }
        }

        if (!empty($this->deq)) {
            return array_pop($this->deq);
        }
        throw new Exception("Empty.");
    }
}