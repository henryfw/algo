<?php

function isMatch($subject, $pattern) {

    if ($pattern == '*') return true;

    if ($subject{1} == '*') {
        if (isMatch(substr($subject, 2), $pattern)) {
            return true;
        }
    }

    if (strlen($pattern) == 0) {
        return $subject == "";
    }

    // pattern not wildcard
    if ($pattern{1} != '*') {

        // subject is wildcard
        if ($subject{1} == '*') {
            if ($subject{0} == $pattern{0}) {
                // loop on pattern til x is no more
                $i = 0;
                while ($i < strlen($pattern)) {
                    if ($pattern{$i} == $subject{0}) {
                        if (isMatch(substr($subject, 2), substr($pattern, $i + 1))) return true;
                    }
                    $i ++;
                }
                return false;
            }
            else {
                return isMatch(substr($subject, 2), $pattern) ;
            }
        }
        if ($pattern{0} != $subject{0}) return false;
        return isMatch(substr($subject, 1), substr($pattern, 1));
    }
    else {
        if (isMatch($subject, substr($pattern, 2))) return true;

        $i = 0;
        while ($i < strlen($subject)) {
            if ($subject{$i} == $pattern{0}) {
                if (isMatch(substr($subject, $i + 1), substr($pattern, 2))) return true;
            }
            $i ++;
        }
        return false;
    }
}



var_dump( isMatch('aa','a')); // false
var_dump( isMatch('aa','aa')); // true
var_dump( isMatch('aaa','aa')); // false
var_dump( isMatch('aa', 'a*')); // true
var_dump( isMatch('aa', '*')); // true
var_dump( isMatch('ab', '*')); // true
var_dump( isMatch('ab', '*')); // true
var_dump( isMatch('a', 'a')); // true
var_dump( isMatch('a*a', 'a')); // true
var_dump( isMatch('aab', 'c*a*b')); // true
var_dump( isMatch('a*a*b', 'ca*b')); // false
var_dump( isMatch('a*a*b', 'aaaaab')); // true