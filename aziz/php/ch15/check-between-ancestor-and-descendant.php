<?php

require "../../../mcdowell/php/ch4-binary-tree.php";


function pairIncludesAncestorAndDescendantOfM($a, $b, $middle) {
    $searchA = $a;
    $searchB = $b;

    while($searchA != $b && $searchA != $middle &&
        $searchB != $a && $searchB != $middle &&
        ($searchA || $searchB)) {

        if ($searchA) {
            $searchA = $searchA->val > $middle->val ? $searchA->left : $searchA->right;
        }
        if ($searchB) {
            $searchB = $searchB->val > $middle->val ? $searchB->left : $searchB->right;
        }
    }

    if ( $searchA != $middle && $searchB != $middle) {
        return false;
    }

    return $searchA == $middle ?
        searchTarget($middle, $b) : searchTarget($middle, $a);
}

function searchTarget($from, $target) {
    while($from && $from != $target) {
        $from = $from->val > $target->val ? $from->left : $from->right;
    }
    return $from == $target;
}






$tree = new BinarySearchTree();
$a = $tree->add(100);
$tree->add(50);
$middle = $tree->add(10);
$notMiddle = $tree->add(20);
$b = $tree->add(2);
$tree->add(200);
$tree->add(300);
$tree->add(150);

var_dump( pairIncludesAncestorAndDescendantOfM($a, $b, $middle));
var_dump( pairIncludesAncestorAndDescendantOfM($a, $b, $notMiddle));