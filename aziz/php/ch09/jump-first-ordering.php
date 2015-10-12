<?php

function jumpFirstOrdering($node, $order = 0) {


    if ($node && $node->order == -1) {
        $node->order = $order ++;
        $order = jumpFirstOrdering($node->jump, $order);
        $order = jumpFirstOrdering($node->next, $order);
    }

    return $order;
}



function jumpFirstOrderingIterative($node) {
    $s = new SplStack();
    $order = 0;
    $s->push($$node);

    while(!$s->isEmpty()) {
        $curr = $s->pop();
        if ($curr != null && $curr->order == -1) {
            $curr->order = $order ++;
            $s->push($curr->next);
            $s->push($curr->jump);
        }
    }
}