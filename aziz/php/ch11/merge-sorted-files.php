<?php

class ArrayEntry {
    public $val;
    public $arrayId;
    public function __construct($val, $arrayId){
        $this->val = $val;
        $this->arrayId = $arrayId;
    }
}

class CustomMinHeap extends SplMinHeap {
    public function compare($item1, $item2) {
        return  $item1->val > $item2->val ? -1 : 1;
    }

}


function mergeSortedArrays(array $arrays) {


    $minHeap = new CustomMinHeap();

    $heads = [];

    for ($i = 0; $i < count($arrays); $i ++ ){
        if (!empty($arrays[$i])) {
            $minHeap->insert( new ArrayEntry($arrays[$i][0], $i) );
            $heads[] = 1;

        }
        else {
            $heads[] = 0;
        }
    }


    $result  = [];
    while ( $minHeap->isEmpty() == false)   {

//        print_r($minHeap);
        $headEntry = $minHeap->extract();


        $result[] = $headEntry->val;
        $smallestArray = $arrays[$headEntry->arrayId];
        $smallestArrayHead = $heads[$headEntry->arrayId];
        if ($smallestArrayHead < count($smallestArray)) {
            $minHeap->insert(new ArrayEntry($smallestArray[$smallestArrayHead], $headEntry->arrayId));
        }
        $heads[$headEntry->arrayId] ++;
    }

    return $result;
}


$inputs = [
    [1,2,3,4,5,6,7,8],
    [0,1,2,5],
    [-1,5,10,11]
];

$ans = mergeSortedArrays($inputs);

print_r($ans);