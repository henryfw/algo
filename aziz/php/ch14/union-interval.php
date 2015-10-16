<?php

class EndPoint {
    public $val;
    public $closed;
    public function __construct($val, $closed) {
        $this->val = $val;
        $this->closed = (bool) $closed;
    }
}




function unionInterval($inputs) {
    $ans = [];

    usort($inputs, function($a, $b) {
        $aStart = $a[0];
        $bStart = $b[0];

        if ($aStart->val < $bStart->val) return -1;
        if ($aStart->val > $bStart->val) return 1;
        if ($aStart->closed && !$bStart->closed)  return -1;
        if (!$aStart->closed && $bStart->closed)  return 1;
        return 0;
    });

    $current = $inputs[0];

    for ($i = 1; $i < count($inputs); $i ++ ) {
        if ($inputs[$i][0]->val < $current[1]->val ||
            ( $inputs[$i][0]->val == $current[1]->val &&
                ($inputs[$i][0]->closed || $current[1]->closed ))
        ) {

            if ($inputs[$i][1]->val > $current[1]->val ||
                ($inputs[$i][1]->val == $current[1]->val && $inputs[$i][1]->isClosed)
            ) {
                $current[1] = $inputs[$i][1];
            }

        }
        else {
            $ans[] = $current;
            $current = $inputs[$i];
        }
    }

    $ans[] = $current;


    return $ans;
}


print_r(unionInterval([
    [new EndPoint(110,1), new EndPoint(125,0)],
    [new EndPoint(100,1), new EndPoint(115,0)],
    [new EndPoint(0,1), new EndPoint(5,0)],
    [new EndPoint(6,1), new EndPoint(11,0)],
    [new EndPoint(7,1), new EndPoint(21,0)],
]));