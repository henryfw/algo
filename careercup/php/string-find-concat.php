<?php

// http://www.careercup.com/question?id=12332722

/* list is a hash table [ 'word' => count ] */
function findStringConcat($words, $input) {
    $list = [];
    $listCount = 0;
    foreach($words AS $word) {
        $listCount ++ ;
        $list[$word] += 1;
    }

    $inputLength = strlen($input);

    for ($offset = 0; $offset < 4; $offset ++) {
        $found = []; // hash table, ['word' => count]
        $foundCount = 0;
        for($i = $offset; $i < $inputLength; $i += 4) {
            if ($i + 3 < $inputLength) {
                $fragment = substr($input, $i, 4);
                if (isset($list[$fragment])) {
                    $found[$fragment] += 1;
                    $foundCount ++;
                    if ($found[$fragment] > $list[$fragment]) break;
                }
                else {
                    if ($foundCount == $listCount) {
                        return implode("", array_keys($found));
                    }
                    else {
                        $found = [];
                    }
                }
            }
        }
        if ($foundCount == $listCount) {
            return implode("", array_keys($found));
        }
    }

    return null;
}




$list = [ "fooo", "barr", "wing", "ding", "wing" ];

$input = "lingmindraboofooowingdingbarrwingmonkeypoundcake";
//$input = "fooowingdingbarrwing";

var_dump(findStringConcat($list, $input));
//    fooowingdingbarrwing


