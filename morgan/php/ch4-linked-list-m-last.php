<?php



function findMToLast($head, $m) {
    if (!$head) return null;

    $current = $head;
    for ($i = 0; $i < $m; $i ++ ){
        if ($current->next) {
            $current = $current->next;
        }
        else {
            return null;
        }
    }

    $mBehind = $head;

    while($current->next) {
        $current = $current->next;
        $mBehind = $mBehind->next;
    }

    return $mBehind;

}