<?php

function findPalindromes($str) {
    $length = strlen($str);

    $foundSet = [];
    $ans = 0;

    for ($left = 0; $left < $length; $left ++) {
        for ($right = $left + 1; $right < $length; $right ++) {
            $segmentLength = $right - $left + 1;
            if ($segmentLength >= 2) {
                $segment = substr($str, $left, $segmentLength);
                if (!isset($foundSet[$segment]) && $segment == strrev($segment)) {
                    $foundSet[$segment] = 1;
                    $ans += $segmentLength;
                }
            }
        }
    }

    return $ans;
}

$str = "abbcbbba";
echo findPalindromes($str);