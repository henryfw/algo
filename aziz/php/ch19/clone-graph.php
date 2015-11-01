<?php

require "graph-vertex.php";

function cloneGraph($g) {
    if (!$g) return null;

    $vertexMap = [$g->hashKey() => new GraphVertex($g->label)];

    $q = [];

    $q[] = $g;

    while (!empty($q)) {
        $v = array_shift($q);
        foreach($v->edges AS $e) {
            if (!isset($vertexMap[$e->hashKey()])) {
                $vertexMap[$e->hashKey()] = new GraphVertex($e->label);
                $q[] = $e;
            }
            $vertexMap[$v->hashKey()]->addEdge( $vertexMap[$e->hashKey()] );
        }
    }
    return $vertexMap[$g->hashKey()];
}

