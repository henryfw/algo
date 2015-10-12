<?php

//  east  100 90 50 60 30 40 20 10  west

// east to west order, inputs = [height=>1, id=>1]
function sunsetView($inputs) {
    $withView = new SplStack();

    $withView->push($inputs[0]);
    $i = 1;



    while ( true ) {
        if ($i == count($inputs)) break;


        $curr = $inputs[$i ++];

        $top = $withView->top();
        while ($top != null && $curr['height'] >= $top['height']) {
            $withView->pop();
            $top = $withView->top();
        }

        $withView->push($curr);
    }

    return $withView;
}


$ans = sunsetView([
    ['height' => 100],
    ['height' => 90],
    ['height' => 50],
    ['height' => 60],
    ['height' => 30],
    ['height' => 40],
    ['height' => 20],
    ['height' => 10],
]);


print_r($ans);
