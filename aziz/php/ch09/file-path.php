<?php

function getShortenPath($str) {
    $path = [];

    $root = false;
    if ($str{0} == '/') $root = true;

    foreach(explode("/", $str) AS $folder) {
        if ($folder == '..') {
            if (empty($path)) {
                if ($root) {
                    throw new Exception("Invalid input.");
                }
                $path[] = "..";
            }
            else if ($path[count($path) - 1] == '..') {
                $path[] = "..";
            }
            else {
                array_pop($path);
            }

        }
        else if ($folder == '.' || $folder == '') {

        }
        else {
            $path[] = $folder;
        }
    }

    return ($root ? '/' : ''). implode('/', $path);
}


echo getShortenPath("ab/sc/./../tc/awk/././");
