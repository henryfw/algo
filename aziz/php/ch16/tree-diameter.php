<?php


class TreeNode {
    public $edges = [];
}

class Edge {
    public $root;
    public $length;
    public function __construct($root, $length) {
        $this->root = $root;
        $this->length = $length;
    }
}

class HeightAndDiameter {
    public $height;
    public $diameter;
    public function __construct($height, $diameter) {
        $this->diameter = $diameter;
        $this->height = $height;
    }
}

function treeDiameter($node) {
    return $node ? helper($node)->diameter : 0;
}

function helper(TreeNode $node) {
    $diameter = - PHP_INT_MAX;
    $height = [0, 0];

    foreach($node->edges AS $edge) {
        $hd = helper($edge->root);
        if ($hd->height + $edge->length > $height[0]) {
            $height[1] = $height[0];
            $height[0] = $hd->height + $edge->length;
        }
        else if ($hd->height + $edge->length > $height[1]) {
            $height[1] = $hd->height + $edge->length;
        }

        $diameter = max($diameter, $hd->diameter) ;
    }

    return new HeightAndDiameter($height[0],
        max($diameter, $height[0] + $height[1]));
}
