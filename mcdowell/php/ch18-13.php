<?php
// doens't work =(

function makeRectangleFromWords($inputs) {
    $maxLength = 0;
    $buckets = [];
    // break up words by length
    foreach($inputs AS $word) {
        $length = strlen($word);
        $maxLength = max($length, $maxLength);
        if (!isset($buckets[$length])) {
            $buckets[$length] = new WordBucket($length);
        }
        $buckets[$length]->addWord($word);
    }
    $maxSize = $maxLength * $maxLength;

    for ($size = $maxSize; $size > 0; $size --) {
        for ($width = 1; $width <= $maxLength; $width ++) {
            if ($size % $width == 0) {
                $height = $size / $width;
                $ans = getValidRectangle($buckets, $width, $height);
                if ($ans) {
                    return $ans;
                }
            }
        }
    }
    return null;
}

function getValidRectangle(&$buckets, $width, $height) {

    // check if the letters in the first col can possibly form a word at all
    $widthBucket = $buckets[$width];
    $heightBucket = $buckets[$height];

    // check if the width bucket can make it that high
    if (!$widthBucket || $widthBucket->size() < $height || !$heightBucket) return null;

    $allWidthBucketWords = $widthBucket->getAllWords();

    $allWidthBucketIndex = getAllIndexCombination(array_keys($allWidthBucketWords), $height);

    foreach($allWidthBucketIndex AS $widthBucketIndexSelected) {
        $firstCol = "";
        $rows = [];
        foreach($widthBucketIndexSelected AS $index) {
            $firstCol .= $allWidthBucketWords[$index]{0};
            $rows[] = $allWidthBucketWords[$index];
        }
        $flag = checkColToEnd($rows, $height, $heightBucket, $firstCol);
        if ($flag) {
            return $rows;
        }
    }

    return null;

}

function checkColToEnd($rows, $height, $heightBucket, $firstColWord) {
    $usedWords = [$firstColWord => 1];
    $width = count($rows[0]);

    for ($col = 0; $col < $width; $col ++ ) {
        // check if this is a word
        $colWord = "";
        for ($row = 0; $row < $height; $row ++ ) {
            $colWord .= $rows[$row][$col];
        }

        $alreadyUsed = (int) $usedWords[$colWord];
        if ($heightBucket->contains($colWord, $alreadyUsed + 1)) {
            $usedWords[$colWord] += 1;
        }
        else {
            return false;
        }
    }

    return true;
}


function getAllIndexCombination($index, $size, $combinations = array()) {
    if (empty($combinations)) {
        foreach($index AS $v) {
            $combinations[] = [$v];
        }
    }

    if ($size == 1) {
        return $combinations;
    }

    $newCombinations = [];

    foreach ($combinations AS $combination) {
        foreach($index AS $v) {
            if (!in_array($v, $combination)) {
                $newValue = $combination;
                $newValue[] = $v;
                $newCombinations[] = $newValue;
            }
        }
    }
    return getAllIndexCombination($index, $size - 1, $newCombinations);

}


class WordBucket {
    static public function wordSignature($word) {
        $tmp = str_split($word);
        sort($tmp);
        return implode("", $tmp);
    }

    public $length;
    public $size = 0;
    public $hash = array(); // key is word-signature, value is list of original words
    public $data = array();

    public function __construct($length) {
        $this->length = $length;
    }

    // create hash table with word-signature (ordered letters) as key and list of original words as value
    public function addWord($word) {
        if (strlen($word) != $this->length) {
            throw new Exception("Word length is not right.");
        }
        $key = self::wordSignature($word);
        if (!isset($this->hash[$key])) {
            $this->hash[$key] = array();
        }
        $this->hash[$key][] = $word;
        $this->data[] = $word;
        $this->size ++;
    }

    public function contains($word, $atLeast = 1) {
        $key = self::wordSignature($word);
        $list = $this->hash[$key];
        if (!$list) return false;
        $count = 0;
        foreach($list AS $v) {
            if ($v == $word) $count ++;
        }
        return $count >= $atLeast;
    }

    public function size() {
        return $this->size;
    }

    public function getHashDataForLetters($letters) {
        $key = self::wordSignature($letters);
        return $this->hash[$key];
    }

    public function getAllWords() {
        return $this->data;
    }
}


print_r(getAllIndexCombination([1,2,3,4], 2));


$ans = makeRectangleFromWords(
    ['abc1', 'acd1', 'ade1',
    'aaa', 'bcd', 'cde', '111']
);


var_dump($ans);