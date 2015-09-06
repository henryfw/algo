<?php



function sortAnagram(&$inputs) {
    static $cache = [];

    usort($inputs, function ($a, $b) use ($cache) {
        if (!isset($cache[$a])) {
            $tmp = str_split($a);
            sort($tmp);
            $cache[$a] = implode("", $tmp);
        }
        if (!isset($cache[$b])) {
            $tmp = str_split($b);
            sort($tmp);
            $cache[$b] = implode("", $tmp);
        }
        return strcmp($cache[$a], $cache[$b]) ;
    });

}




$inputs = [
    'army', 'abc', 'def', 'many', 'zzz', 'cba'
];
sortAnagram($inputs);
print_r($inputs);