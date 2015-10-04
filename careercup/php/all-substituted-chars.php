<?php

// http://www.careercup.com/question?id=15419952

function getSubstitutedChars($str, $map) {
    $counter = 0;
    $ans = [];
    for ($i = 0; $i < strlen($str); $i ++) {

        $options = [$str{$i}];
        if (isset($map[$str{$i}])) {
            $options = array_merge($options, $map[$str{$i}]);
        }

        if ($i == 0) {
            foreach($options AS $newChar) {
                $counter++;
                $ans[] = [$newChar];
            }
        }
        else {
            $newAns = [];
            for ($j = 0; $j < count($ans); $j ++) {
                foreach($options AS $newChar) {
                    $counter ++;
                    $newAns[] = array_merge($ans[$j], [$newChar]);
                }
            }
            $ans = $newAns;
        }

    }
    echo $counter;
    return $ans;
}


print_r(getSubstitutedChars("fab", ["f" => ['F', 4], 'a' => ['A', 3], 'b' => ['B', 8]]));