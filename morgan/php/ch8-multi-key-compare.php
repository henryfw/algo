<?php

// to make a unstable sort stable, use add index as 2nd key and use multi key sort

$data = [
    ['a' => 1, 'b' => 2, 'c' => 3],
    ['a' => 21, 'b' => 1, 'c' => 3],
    ['a' => 21, 'b' => 2, 'c' => 3],
    ['a' => 21, 'b' => 2, 'c' => 23],
];


usort($data, function($a, $b) {
   if ($a['a'] == $b['a']) {
       if ($a['b'] == $b['b']) {
           return $a['c'] - $b['c'];
       }
       return $a['b'] - $b['b'];
   }
    return $a['a'] - $b['a'];
});


print_r($data);