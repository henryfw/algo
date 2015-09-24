<?php

// http://www.careercup.com/question?id=6715482117767168


function nodeLevel($node) {
    $level = 0;
    while($node) {
        $level ++;
        $node = $node->parent;
    }
    return $level;
}


function findAncestor($node1, $node2) {
    $level1 = nodeLevel($node1);
    $level2 = nodeLevel($node2);


    while($level1 > $level2) {
        $node1 = $node1->parent;
        $level1 --;
    }
    while($level2 > $level1) {
        $node2 = $node2->parent;
        $level2 --;
    }

    while ($node1->parent != $node2->parent) {
        $node1 = $node1->parent;
        $node2 = $node2->parent;
    }

    return $node1->parent;
}

