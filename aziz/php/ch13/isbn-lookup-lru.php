<?php

class LRUCache {
    protected $history; // pointer to real object
    protected $hash; // pointer to history node
    protected $maxSize;
    protected $size = 0;

    public function __construct($maxSize = 100) {
        $this->maxSize = $maxSize;
        $this->hash = [];
    }

    public function put($key, $value) {
        $historyNode = null;
        $item = null;
        if (isset($this->hash[$key])) {
            $historyNode = $this->hash[$key];
            $item = $historyNode->pointer;
            $item->value = $value;
        }
        else {
            $item = new LRUCacheItem($key, $value);
            $historyNode = new LinkedListNode($item);
            $this->hash[$key] = $historyNode;
            $this->size ++;
        }

        // move LRU to front
        $this->moveToFront($historyNode) ;

        // reduce size
        $this->resize();

        return true;
    }

    public function resize() {
        if ($this->size > 2 * $this->maxSize) {
            $i = 0;
            $currentNode = $this->history;
            while( $currentNode) {
                $i ++;
                if ($i > $this->maxSize) {
                    $key = $currentNode->pointer->key; // LRUCacheItem->key
                    unset($this->hash[$key]);
                    if ($currentNode->prev) {
                        $currentNode->prev->next = null;
                    }
                    $currentNode->prev = null;
                }
                $currentNode = $currentNode->next;
            }
        }

    }

    public function moveToFront(LinkedListNode $historyNode) {
        if ($historyNode->prev) {
            $historyNode->prev->next = $historyNode->next;
        }

        $historyNode->prev = null;
        if ($this->history) {
            $this->history->prev = $historyNode;
        }
        $historyNode->next = $this->history;
        $this->history = $historyNode;
    }

    public function remove($key) {
        if (isset($this->hash[$key])) {
            $historyNode = $this->hash[$key];
            unset($this->hash[$key]);
            if ($historyNode->prev) {
                $historyNode->prev->next = $historyNode->next;
            }
            $historyNode->prev = $historyNode->next = null;
            return true;
        }
        return false;
    }

    public function get($key) {
        if (isset($this->hash[$key])) {
            $historyNode = $this->hash[$key];
            $item = $historyNode->pointer;
            if ($historyNode->prev) {
                $historyNode->prev->next = $historyNode->next;
            }

            $this->moveToFront($historyNode) ;
            return $item->value;
        }
        return null;
    }

    public function __toString() {
        $text = "";
        $currentNode = $this->history;
        while( $currentNode) {
            $k = $currentNode->pointer->key; // LRUCacheItem->key
            $text .= "$k:{$currentNode->pointer->value} ";
            $currentNode = $currentNode->next;
        }

        $text .= "\n";
        return $text;
    }
}


class LRUCacheItem {
    public $key;
    public $value;
    public function __construct($key, $value){
        $this->key = $key;
        $this->value = $value;
    }
}

class LinkedListNode {
    public $prev;
    public $next;
    public $pointer;
    public function __construct($pointer, $prev = null, $next = null){
        $this->pointer = $pointer;
        $this->prev = $prev;
        $this->next = $next;
    }
}


$cache = new LRUCache(3);
$cache->put('a', '1');
echo $cache;
$cache->put('b', '2');
$cache->put('c', '3');
$cache->put('d', '4');
$cache->put('e', '5');
$cache->put('f', '6');
$cache->put('g', '7');
$cache->put('h', '8');
echo $cache;
$cache->get('g', '8');
echo $cache;