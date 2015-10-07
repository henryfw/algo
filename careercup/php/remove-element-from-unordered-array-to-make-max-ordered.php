<?php


// http://www.careercup.com/question?id=6305921

function removeElementFromUnordered($inputs, $start, $selected) {
    static $cache = [];

    $key = "$start-" . implode(',', $selected);
    if (isset($cache[$key])) return $cache[$key];

    if ($start == count($inputs)) return $selected;

    if (empty($selected) || $inputs[$start] > end($selected)) {
        $with = removeElementFromUnordered($inputs, $start + 1, array_merge($selected, [$inputs[$start]]));
        $without = removeElementFromUnordered($inputs, $start + 1, $selected);

        $withCount = count($with);
        $withoutCount = count($without);

        if ($withCount > $withoutCount) {
            return $cache[$key] = $with;
        }
        else {
            return $cache[$key] = $without;
        }
    }
    else {
        return $cache[$key] = removeElementFromUnordered($inputs, $start + 1, $selected);
    }
}

print_r(removeElementFromUnordered([9,1,1,2,2,3,4], 0, []));

