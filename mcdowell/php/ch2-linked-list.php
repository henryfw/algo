<?php

class LinkedList {
    public $first;

    public function addValue($val) {
        $node = new LinkedListNode($val);
        if (!$this->first) {
            $this->first = $node;
        }
        else {
            $this->first->addLinkedListNode($node);
        }
        return $node;
    }

    public function removeValue($val) {
        if (!$this->first) return 0;

        if ($this->first->val == $val) {
            $this->first = null;
            return 1;
        }

        return $this->first->removeValue($val, $this->first);
    }

    public function getAll() {
        $values = array();
        $pointer = $this->first;
        while ($pointer != null) {
            $values[] = $pointer->val;
            $pointer = $pointer->next;
        }
        return $values;
    }
}


class LinkedListNode {
    public $next;
    public $val;

    public function __construct($val) {
        $this->val = $val;
    }

    public function addLinkedListNode(LinkedListNode $node) {
        $pointer = $this;
        while ($pointer->next != null) {
            $pointer = $pointer->next;
        }
        $pointer->next = $node;
    }

    public function removeValue($val) {

        $pointer = $this;
        $lastPointer = null;
        $flag = 0;
        while ($pointer != null) {
            if ($pointer->val == $val) {
                $lastPointer->next = $pointer->next;
                $flag ++;
            }
            else {
                $lastPointer = $pointer;
            }
            $pointer = $pointer->next;
        }


        return $flag;
    }

    public function __toString() {
        return (string) $this->val;
    }
}


//$list = new LinkedList();
//$list->addValue(2);
//$list->addValue(3);
//$list->addValue(3);
//$list->addValue(3);
//$list->addValue(4);
//$list->addValue(5);
//$list->addValue(6);
//print_r($list->getAll());
//
//var_dump($list->removeValue(3));
//var_dump($list->removeValue(3));
//var_dump($list->removeValue(5));
//
//print_r($list->getAll());