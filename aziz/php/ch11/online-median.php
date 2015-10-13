<?php


function onlineMedian($inputs ) {

    $minHeap = new SplMinHeap();
    $maxHeap = new SplMaxHeap();

    foreach($inputs AS $i) {
        if ($minHeap->isEmpty()) {
            $minHeap->insert($i);
        }
        else {
            if ($i > $minHeap->top() ) {
                $minHeap->insert($i);
            }
            else {
                $maxHeap->insert($i);
            }
        }

        if ($minHeap->count() > $maxHeap->count() + 1) {
            $maxHeap->insert($minHeap->extract());
        }
        else if ($maxHeap->count() > $minHeap->count()) {
            $minHeap->insert($maxHeap->extract());
        }

        $median = $minHeap->count() == $maxHeap->count() ?
            0.5 * ($minHeap->top() + $maxHeap->top()):
            $minHeap->top();

        echo "$median \n";
    }


}


onlineMedian([1,11,20,5,2,3,4,5,6,7,8,1]);