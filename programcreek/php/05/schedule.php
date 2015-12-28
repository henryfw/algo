<?php

/*
There are a total of n courses you have to take, labeled from 0 to n - 1. Some courses may have prerequisites,
for example to take course 0 you have to first take course 1, which is expressed as a pair: [0,1].
Given the total number of courses and a list of prerequisite pairs, is it possible for you to finish all courses?

This time a valid sequence of courses is required as output.
*/


function canFinish($numCourses, array $prerequisites) {
    $len = count($prerequisites);

    if ($len == 0) return range(0, $numCourses - 1);

    // counter for number of prereq in each course
    $pCounter = [];
    for ($i = 0; $i < $len; $i ++ ) {
        $pCounter[$prerequisites[$i][0]] ++;
    }

    //store courses that have no prerequisites
    $queue = new SplDoublyLinkedList();
    for ($i = 0; $i < $numCourses; $i ++ ) {
        if ($pCounter[$i] == 0) {
            $queue->push($i);
        }
    }

    // number of courses that have no prerequisites
    $numNoPre = $queue->count();

    $result = [];
    $j = 0;


    while ($queue->count() > 0) {
        $top = $queue->shift();
        $result[$j ++] = $top;

        for ($i = 0; $i < $len; $i++) {
            if ($prerequisites[$i][1] == $top) {
                $pCounter[$prerequisites[$i][0]] --;
                if ($pCounter[$prerequisites[$i][0]] == 0) {
                    $numNoPre ++;
                    $queue->push($prerequisites[$i][0]);
                }
            }
        }
    }


    $canFinish = $numNoPre == $numCourses;

    return $canFinish ? $result : null;
}


print_r(canFinish(5,  [[1,0]]));