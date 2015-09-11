<?php


function transform($startWord, $stopWord, &$dictionary) {
    $counter = 0;

    $startWord = strtoupper($startWord);
    $stopWord = strtoupper($stopWord);

    $actionQueue = [];
    $visitedSet = [];
    $backtrackMap = [];

    $actionQueue[] = $startWord;
    $visitedSet[$startWord] = 1;

    while (count($actionQueue) > 0) {
        $w = array_shift($actionQueue);
        foreach (getOneEditWords($w, $dictionary) AS $v) {
            $counter ++;

            if ($v == $stopWord) {
                $list = [];
                $list[] = $stopWord;

                while ($w != null) {
                    array_unshift($list, $w);
                    $w = $backtrackMap[$w];
                }
                return $list;
            }

            if (!isset($visitedSet[$v])) {
                $actionQueue[] = $v;
                $visitedSet[$v] = 1;
                $backtrackMap[$v] = $w;
            }


        }
    }
    echo "Counter $counter \n";
    return null;

}


function getOneEditWords($word, &$dictionary) {
    $words = [];

    for ($i = 0; $i < strlen($word); $i ++ ) {
        $wordTmp = $word;
        $charStart = ord('A');
        $charEnd = ord('Z');
        for ($c = $charStart; $c <= $charEnd; $c ++) {
            $char = chr($c);
            if ( $char != $word{$i} ) {
                $wordTmp{$i} = $char;
                if (isset($dictionary[$wordTmp])) {
                    $words[] = $wordTmp;
                }
            }
        }
    }

    return $words;
}


$dictionary = [
    'ABC' => 1,
    'ABB' => 1,
    'BBB' => 1,
    'BCA' => 1,
    'CCA' => 1,
    'CAB' => 1,
    'AAA' => 1,
    'AAB' => 1,
];

$ans = transform('ABC', 'AAA', $dictionary);

print_r($ans);