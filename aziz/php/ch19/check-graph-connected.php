<?php

require "graph-vertex.php";

function isGraphMinimallyConnected($graphVertex) {
    return empty($graphVertex) || !hasCycle($graphVertex[0], null);
}


function hasCycle(GraphVertex $cur, $pre) {
    if ($cur->color == GraphVertex::GRAY) return true;

    $cur->color = GraphVertex::GRAY;

    foreach ($cur->edges AS $next) {
        if ($next != $pre && $next->color != GraphVertex::BLACK) {
            if (hasCycle($next, $cur)) {
                return true;
            }
        }
    }
    $cur->color = GraphVertex::BLACK;

    return false;

}

