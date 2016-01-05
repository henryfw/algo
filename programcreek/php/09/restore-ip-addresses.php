<?php

// https://leetcode.com/discuss/77/restore-ip-addresses

function restoreIpAddresses($s) {
    if (strlen($s) > 12 || strlen($s) < 4) return [];


    $ans = [];

    for ($i = 1; $i < 4; $i ++ ) {
        $first = substr($s, 0, $i);

        if (!isValid($first)) continue;

        for ($j = 1; $i + $j < strlen($s) && $j < 4; $j ++ ) {
            $second = substr($s, $i, $j);
            if (!isValid($second)) continue;

            for ($k = 1; $i + $j + $k < strlen($s) && $k < 4; $k ++ ) {
                $third = substr($s, $i + $j, $k);
                $fourth = substr($s, $i + $j + $k);

                if (!isValid($third) || !isValid($fourth)) continue;

                $ans[] = "{$first}.{$second}.{$third}.{$fourth}";
            }
        }
    }

    return $ans;
}

function isValid($s) {
    if (strlen($s) > 3) return false;
    if (strlen($s) > 1 && $s{0} == '0') return false;
    if ((int) $s >= 0 && (int) $s <= 255) return true;
    return false;
}


print_r(restoreIpAddresses("11111112"));

