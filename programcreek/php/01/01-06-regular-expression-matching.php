<?php

/*
'.' Matches any single character.
'*' Matches zero or more of the preceding element.
 */

function isMatch($str, $pattern) {
    echo "checking $str for $pattern\n";
    if (strlen($pattern) == 0) {
        return strlen($str) == 0;
    }


    if (strlen($pattern) == 1 || $pattern{1} != '*') {

        if (strlen($str) < 1) return false;

        if ($pattern{0} != $str{0} && $pattern{0} != '.' ) return false;

        return isMatch(substr($str, 1), substr($pattern, 1));

    }

    else {

        if (isMatch($str, substr($pattern, 2))) return true;

        $i = 0;
        while ($i < strlen($str) && ($str{$i} == $pattern{0}) || $pattern{0} == '.') {
            if (isMatch(substr($str, $i + 1), substr($pattern, 2))) return true;

            $i++;
        }
        return false;

    }

}


//$ans[] = isMatch("aa","a") ;
$ans[] = isMatch("aba","aca") ;
//$ans[] = isMatch("aa","aa") ;
//$ans[] = isMatch("aaa","aa") ;
//$ans[] = isMatch("aa", "a*") ;
//$ans[] = isMatch("aa", ".*") ;
//$ans[] = isMatch("ab", ".*") ;
//$ans[] = isMatch("aab", "c*a*b") ;

print_r($ans);