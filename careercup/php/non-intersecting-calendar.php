<?php

// http://www.careercup.com/question?id=5666830939062272

/*

http://farazdagi.com/blog/2013/weighted-interval-scheduling/

That’s it! You just grab interval i which has the earliest fi, discard any intervals that overlap with i,
and continue until there’s no more intervals to pick from.

*/


// $inputs = [ ['start'=>1, 'end' =>10] , ... ]
function unweightedSchedule($inputs) {
    usort($inputs, function($a, $b) {
        return $a['end'] - $b['end'];
    });

    $ans = [];
    $finish = $inputs[0]['start'];
    foreach($inputs AS $item) {
        if ($item['start'] >= $finish) {
            $finish = $item['end'];
            $ans[] = $item;
        }
    }
    return $ans;
}

function weightedSchedule($inputs) {
    usort($inputs, function($a, $b) {
        return $a['end'] - $b['end'];
    });

    $itemToUse = $inputs[0];

    $ans = max(
        weightedScheduleBody(array_slice($inputs, 1), 0, 0), // don't include first
        weightedScheduleBody(array_slice($inputs, 1), $itemToUse['weight'], $itemToUse['end'])
    );

    return $ans;
}

function weightedScheduleBody($itemsLeft, $currentWeight, $finishTime) {
    static $cache = []; // todo: memorize

    if (empty($itemsLeft)) return $currentWeight;

    $itemToUse = null;
    for($i = 0; $i < count($itemsLeft); $i ++) {
        if ($itemsLeft[$i]['start'] >= $finishTime) {
            $itemToUse = $i;
            break;
        }
    }

    if ($itemToUse === null) return $currentWeight;

    array_splice($itemsLeft, $itemToUse, 1);

    return max (
        weightedScheduleBody( $itemsLeft, $currentWeight, $finishTime)  , // don't include
        weightedScheduleBody( $itemsLeft, $currentWeight + $itemsLeft[$itemToUse]['weight'], $itemsLeft[$itemToUse]['end'] )
    );
}

$inputs = [
    ['weight' => 10, 'start' => 1, 'end' => 3],
    ['weight' => 20, 'start' => 2, 'end' => 3],
    ['weight' => 30, 'start' => 3, 'end' => 5],
    ['weight' => 40, 'start' => 5, 'end' => 7],
    ['weight' => 50, 'start' => 8, 'end' => 9],
    ['weight' => 60, 'start' => 10, 'end' => 13],
    ['weight' => 70, 'start' => 12, 'end' => 23],
];

$ans = unweightedSchedule($inputs);
//print_r($ans);

$ans = weightedSchedule($inputs);
print_r($ans);