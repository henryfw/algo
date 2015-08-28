<?php

require "ch4-graph.php";


class GraphBFS extends Graph {

    public function bfs($sourceNode, $targetVal) {

        $openList = array($sourceNode);

        while ($node = array_shift($openList)) {
            echo "checking {$node->val}\n";
            if ($node->val == $targetVal) return true;
            foreach($node->next AS $i) {
                array_push($openList, $i);
            }
        }

        return false;
    }

}


$graph = new GraphBFS();
$graph->add(1);
$graph->add(2);
$graph->add(3);
$graph->add(4);
$graph->add(5);
$x = $graph->add(6);
$graph->add(7);
$graph->add(8);
$graph->add(9);
$x->next[] = $graph->add(10);


var_dump($graph->bfs($graph->root, 10));



