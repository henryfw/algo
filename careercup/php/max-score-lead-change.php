<?php

// http://www.careercup.com/question?id=5659765149532160

class Counter {
    public static $count = 0;
}


function calcMaxScoreLeadChange($runningA, $runningB, $pointsA, $pointsB, $changes) {

    static $cache = [];
    $key = implode("-", $pointsA) . '-' . $runningA . '-' . implode("-", $pointsB) . '-' . $runningB;

    if (isset($cache[$key])) {
        return $cache[$key];
    }

    if (empty($pointsA) && empty($pointsB)) return $changes ;

    Counter::$count ++;

    if (empty($pointsA)) {
        if ($runningB < $runningA) {
            if (array_sum($pointsB) + $runningB > $runningA) {
                $changes ++;
            }
        }
        $cache[$key] = $changes;
        return $changes;
    }
    if (empty($pointsB)) {
        if ($runningA < $runningB) {
            if (array_sum($pointsA) + $runningA > $runningB) {
                $changes ++;
            }
        }
        $cache[$key] = $changes;
        return $changes;
    }

    $ans = 0;

    for ($i = 0; $i < count($pointsA); $i ++) {
        for ($j = 0; $j < count($pointsB); $j ++) {
            $newChanges = $changes;
            $pointA = $pointsA[$i];
            $pointB = $pointsA[$j];
            $pointsAUsed = $pointsA;
            array_splice($pointsAUsed, $i, 1);
            $pointsBUsed = $pointsB;
            array_splice($pointsBUsed, $j, 1);

            // use A, use B
            if ( ($runningA > $runningB && $runningA + $pointA < $runningB + $pointB) ||
                ($runningA < $runningB && $runningA + $pointA > $runningB + $pointB)
            ) {
                $newChanges = $changes + 1;
            }
            $result1 = calcMaxScoreLeadChange($runningA + $pointA, $runningB + $pointB, $pointsAUsed, $pointsBUsed, $newChanges );

            // use A, don't use B
            if ( ($runningA > $runningB && $runningA + $pointA < $runningB ) ||
                ($runningA < $runningB && $runningA + $pointA > $runningB )
            ) {
                $newChanges = $changes + 1;
            }
            $result2 = calcMaxScoreLeadChange($runningA + $pointA, $runningB, $pointsAUsed, $pointsB, $newChanges  );

            // don't use A, use B
            if ( ($runningA > $runningB && $runningA  < $runningB + $pointB) ||
                ($runningA < $runningB && $runningA  > $runningB + $pointB)
            ) {
                $newChanges = $changes + 1;
            }
            $result3 = calcMaxScoreLeadChange($runningA, $runningB + $pointB, $pointsA, $pointsBUsed, $newChanges  );

            $ans = max($ans, $result1, $result2, $result3);
        }
    }

    $cache[$key] = $ans;
    return $ans;

}


echo calcMaxScoreLeadChange(0, 0, [1,2,9], [1,3,2], 0) . "\n";
echo Counter::$count . "\n";

