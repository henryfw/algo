<?php

// http://www.careercup.com/question?id=16381662

// suffix tree


class Tree {
    public $root;
    public function __construct() {
        $this->root = new Node();
    }

    public function addWord($word, $index) {
        $chars = str_split($word);
        for ($end = count($chars) - 1; $end >= 0; $end --) {
            $this->root->addSuffix(array_slice($chars, $end), [$index]);
        }
    }

    public function show() {
        $this->root->show();
    }

    public function findLongestSubstring($numOfWords) {
        $bestNode = null;
        $bestLength = 0;
        $openList = [[$this->root, 0]];

        while (count($openList)) {
            $item = array_shift($openList);
            $node = $item[0];
            $parentLength = $item[1];

            $newLength = $parentLength + count($node->chars);


            if (count($node->indexes) < $numOfWords) continue;

            if ($newLength > $bestLength) {
                $bestLength = $newLength;
                $bestNode = $node;
            }
            foreach($node->children AS $child) {
                $openList[] = [$child, $newLength];
            }
        }

        if (!$bestNode) return "";

        $node = $bestNode;
        $ans = "";
        while ($node != null) {
            $ans = implode("", $node->chars) . $ans;
            $node = $node->parent;
        }

        return $ans;
    }
}


class Node {
    public $chars = []; // array
    public $indexes = []; // hash
    public $children = []; // array
    public $parent = null;


    public function addSuffix(array $suffix, array $index) {
        foreach($index AS $k) $this->indexes[$k] = 1;

//        print_r($suffix); print_r($index);

        for ($i = 0; $i < count($this->children); $i++) {

            $j = 0;
            while ( count($suffix) > $j && $suffix[$j] == $this->children[$i]->chars[$j] ) {
                $j ++;
            }

            if ($j != 0) {

                $childNode = $this->children[$i];

                foreach($index AS $k) $childNode->indexes[$k] = 1;
                $leftOverChildChars = array_slice($childNode->chars, $j);
                $childNode->chars = array_slice($childNode->chars, 0, $j);

                $leftOverSuffix = array_slice($suffix, $j);


                if (count($leftOverChildChars)) {
//                    echo "split child: " . implode("", $childNode->chars) . ' ' . implode("", $leftOverChildChars) ."\n";
                    $childNode->addSuffix($leftOverChildChars, array_keys($childNode->indexes));
                }
                if (count($leftOverSuffix)) {
//                    echo "over suffix: " . implode("", $leftOverSuffix) ."\n";
                    $childNode->addSuffix($leftOverSuffix, $index);
                }
                return;
            }
        }

        $newNode = new Node();
        $newNode->parent = $this;
        $newNode->chars = $suffix;
        foreach($index AS $k) $newNode->indexes[$k] = 1;
        $this->children[] = $newNode;
    }

    public function show() {
        echo "Chars: " . implode(",", $this->chars) . ". Index: " . implode(",", array_keys($this->indexes)). "\n";
        foreach ($this->children AS $child) $child->show();

    }
}

function findLongestSubstring($inputs) {
    $tree = new Tree();
    for($i = 0; $i < count($inputs); $i ++) $tree->addWord($inputs[$i], $i);
    $tree->show();
    return $tree->findLongestSubstring(count($inputs));
}

$inputs = [
    "tomorrow",
    "row"
];
echo findLongestSubstring($inputs);