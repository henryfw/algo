<?php



function subsets(array $inputs) {
    sort($inputs);

    $results = [];

    for ($i = 0; $i < count($inputs); $i ++ ) {
        $temp = [];

        foreach($results AS $item) {
            $temp[] = $item;
        }

        foreach($temp AS $k => $v) {
            $temp[$k][] = $inputs[$i];
        }

        $temp[] = [$inputs[$i]];

        foreach($temp AS $v) {
            $results[] = $v;
        }
    }

    return $results;
}


print_r(subsets([1,2,3]));