<?php
// prefix tree: search for substring in one string
// suffix tree: search for longest common substring between many strings

class PrefixTree {
    public $root = null;
    public function __construct($string) {
        $this->root = new PrefixTreeNode();
        for ($i = 0; $i < strlen($string); $i ++) {
            $this->root->insertString(substr($string, $i), $i);
        }
    }

    public function search($string) {
        return $this->root->search($string);
    }
}


class PrefixTreeNode {
    public $children = []; // edges store letter
    public $indexes = []; // vertices store starting index

    public function insertString($string, $index) {
        if ($string != null && strlen($string)) {
            $value = $string{0};
            $child = null;
            if (isset($this->children[$value])) {
                $child = $this->children[$value];
            }
            else {
                $child = new PrefixTreeNode();
                $this->children[$value] = $child;
            }

            $remainder = substr($string, 1);
            $child->indexes[] = $index;
            $child->insertString($remainder, $index);
        }
    }

    public function search($string) {
        if ($string == null || !strlen($string)) {
            return $this->indexes;
        }
        else {
            $first = $string{0};
            if (isset($this->children[$first])) {
                $reminder = substr($string, 1);
                return $this->children[$first]->search($reminder);
            }

        }
        return null;
    }

    public function preOrderTranverse($depth = 0) {

        $pad = str_pad("", $depth, '-');


        foreach($this->children AS $k => $child) {
            echo "$pad{$k}     ";
            echo "index: " . implode(', ', $child->indexes);
            echo "\n";
            $child->preOrderTranverse($depth + 2);
        }


    }
}



$tree = new PrefixTree("bibs");
$tree->root->preOrderTranverse();

print_r($tree->search('bibs'));