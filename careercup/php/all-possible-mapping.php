<?php

// http://www.careercup.com/question?id=5765850736885760

function allPossibleMapping($str, $map) {

    $ans = [];
    $init = false;
    foreach($map AS $oldChar => $mapValue) {
        $newAns = [];
        foreach($mapValue AS $newChar) {
            if (!$init) {
                $ans[] = str_replace($oldChar, $newChar, $str);
            }
            else {

                foreach($ans AS $row) {
                    $newAns[] = str_replace($oldChar, $newChar, $row);
                }
            }
        }
        if ($init) {
            $ans = $newAns;
        }
        $init = true;
    }

    return $ans;
}


print_r(allPossibleMapping('112', [ '1' => ['A', 'B', 'C'], '2' => ['D', 'E', 'F']]));