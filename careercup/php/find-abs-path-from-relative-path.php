<?php

// find path

function findAbsolutePath($startingAbsolute, $relativePath) {

    if ($relativePath{0} == "/") {
        $startingAbsolute = "/";
    }

    if ($startingAbsolute{0} != "/") {
        throw new Exception("Starting path must be absolute.");
    }

    $startingAbsolute = trim($startingAbsolute, "/");
    $relativePath = trim($relativePath, "/");


    $absoluteStack = explode("/", $startingAbsolute);
    $relativeStack = explode("/", $relativePath);

    $ansStack = $absoluteStack;



    while (count($relativeStack) > 0) {

        $relativeItem = array_shift($relativeStack);

        if ($relativeItem == ".") continue;
        else if ($relativeItem == "") continue;

        else if ($relativeItem == "..") {
            if (count($ansStack) > 0) {
                array_pop($ansStack);
            }
            else {
                throw new Exception("Cannot go higher than the root folder.");
            }
        }
        else {
            $ansStack[] = $relativeItem;
        }
    }

    return "/" . implode("/", $ansStack);
}


echo findAbsolutePath("/usr/bin/mail", "../../../etc/xyz/../abc");