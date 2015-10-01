<?php


//  http://www.careercup.com/question?id=5685788633202688


function getMaxSubsetOfLinesInCircle($linesLeft, $linesChosen) {

    static $cache = [];
    $key = hashLines($linesLeft);
    if (isset($cache[$key])) return $cache[$key];

    if (empty($linesLeft)) return count($linesChosen);


    $flag = false;
    while (count($linesLeft) > 0) {
        $lineChosen = array_pop($linesLeft);

        // verify this can fit in set
        if (!lineInterceptWithSet($lineChosen, $linesChosen)) {
            $flag = true;
            break;
        }
    }
    if (!$flag) {
        return count($linesChosen);
    }

    $withLine = getMaxSubsetOfLinesInCircle($linesLeft, array_merge($linesChosen, [$lineChosen]));
    $withoutLine = getMaxSubsetOfLinesInCircle($linesLeft, $linesChosen);
    $ans = max($withLine, $withoutLine);

    $cache[$key] = $ans;

    return $ans;
}

function hashLines($lines) {
    return "";
}

/*
 * Plot line on circle. Find angle to circle center for both points to form a range.
 * If 2nd line have 0 or both angles inside that rage, no intercept. Else intercept.
 */
function lineInterceptWithSet($line, $set) {
    $line1XStart = $line[0][0];
    $line1XEnd = $line[1][0];
    $line1YStart = $line[0][1];
    $line1YEnd = $line[1][1];


    foreach($set AS $item) {
        $line2XStart = $item[0][0];
        $line2XEnd = $item[1][0];
        $line2YStart = $item[0][1];
        $line2YEnd = $item[1][1];


    }
    return true;
}


