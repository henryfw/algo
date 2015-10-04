<?php


class Tree {
    public $head;
    public $tail;

    public function reverse() {
        $oldHead = $this->head;
        $oldTail = $this->tail;

        $lastNode = $this->head;
        $node = $lastNode->next;

        while ($node != null) {
            $nextNode = $node->next;
            $node->next = $lastNode;
            $lastNode = $node;
            $node = $nextNode;
        }

        $this->head = $oldTail;

        $this->tail = $oldHead;
        $this->tail->next = null;

    }
}

