<?php

class Rectangle {
    public $x;
    public $y;
    public $width;
    public $height;
    public function __construct($x, $y, $width, $height) {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
    }
}


function getIntersection(Rectangle $r1, Rectangle $r2) {
    if (doesIntersect($r1, $r2)) {
        $x = max($r1->x, $r2->x);
        $y = max($r1->y, $r2->y);
        $width = min($r1->x + $r1->width, $r2->x + $r2->width) - $x;
        $height = min($r1->y + $r1->height, $r2->y + $r2->height) - $y;

        return new Rectangle($x, $y, $width, $height);
    }
    return null;
}

function doesIntersect(Rectangle $r1, Rectangle $r2) {
    return $r1->x < $r2->x + $r2->width && $r1->x + $r1->width > $r2->x &&
        $r1->y < $r2->y + $r2->height && $r2->x + $r2->height > $r2->y;
}

