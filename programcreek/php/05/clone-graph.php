<?php

// 1) map old node to a copy in hashtable
// 2) do bfs and add neighbors to the copy in hastable

function cloneGraph($node) {
    if (!$node) return $node;


    $q = new SplDoublyLinkedList();

    $map = new SplObjectStorage();

    $newHead = new Node($node->label);

    $q->push($node);
    $map[$node] = $newHead;

    while ($q->count() > 0) {
        $curr = $q->shift();

        $currNeighbors = $curr->neighbors;

        foreach ($currNeighbors AS $neighbor) {
            if (!isset($map[$neighbor])) {
                $copy = new Node($neighbor->label);
                $map[$neighbor] = $copy;
                $map[$curr]->neighbors[] = $copy;
                $q->push($neighbor);
            }
            else {
                $map[$curr]->neighbors[] = $map[$neighbor];
            }
        }
    }

    return $newHead;
}