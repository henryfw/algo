<?php


// http://www.careercup.com/question?id=14851686

// http://stackoverflow.com/questions/21966886/given-a-set-of-intervals-find-the-interval-which-has-the-maximum-number-of-inte/22017949#22017949

// http://stackoverflow.com/questions/9672434/giving-lots-of-intervals-ai-bi-find-a-interval-which-intersect-with-the-most



function findMaxIntersectionsOfPoints($inputs) {
    $allPoints = [];
    foreach($inputs AS $v) {
        $allPoints[] = new StartPoint($v[0]);
        $allPoints[] = new EndPoint($v[1]);
    }
    usort($allPoints, function($a, $b) {
        if ($a->value < $b->value) {
            return -1;
        }
        else if ($a->value > $b->value) {
            return 1;
        }
        else {
            if ($a instanceof StartPoint) {
                return -1;
            }
            else {
                return 1;
            }
        }
    });
    $sum = 0;
    $max = 0;
    foreach($allPoints AS $point) {
//        echo "{$point->value} \n";
        if ($point instanceof StartPoint) $sum ++;
        else $sum --;
        $max = max($max, $sum);
    }
    return $max;
}

class StartPoint {
    public $value;
    public function __construct($value) {
        $this->value = $value;
    }
}

class EndPoint {
    public $value;
    public function __construct($value) {
        $this->value = $value;
    }
}


echo findMaxIntersectionsOfPoints([
    [1,10],
    [2,11],
    [3,14],
    [5,20],
    [7,8],
    [12,20],
]);

