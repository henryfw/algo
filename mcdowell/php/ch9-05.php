<?php

function permutation($text, $index) {
    if ($index == 0) return [$text{0}];

    $ans = permutation($text, $index - 1);
    $newTextValue = $text{$index};

    $newAns = $ans;

    foreach($ans as $ansItem) {
        for($i = 0; $i <= strlen($ansItem); $i ++) {
            $newAnsItem = substr($ansItem, 0, $i) . $newTextValue . substr($ansItem, $i);
            $newAns[] = $newAnsItem;
        }
    }

    return $newAns;
}

print_r(permutation('abc', 2));