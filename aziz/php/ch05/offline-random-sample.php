<?php

function offlineRandomSample($inputs, $k) {

    $samples = array_slice($inputs, 0, $k);


    for ($i = $k; $i < count($inputs); $i ++) {
        $randomIndex = rand(0, $i);

        if ($randomIndex < $k) {
            $samples[$randomIndex] = $inputs[$i];
        }
    }

    return $samples;
}