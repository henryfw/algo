<?php


require_once "../../../mcdowell/php/ch2-linked-list.php";
require_once "../ch07/merge-linked-list.php";

function sortingListInsertionSortSlow(LinkedListNode $node) {
    $dummyHead = new LinkedListNode(null);
    $dummyHead->next = $node;

    $iter = $node;

    while ($iter && $iter->next) {
        if ($iter->val > $iter->next->val) {
            $target = $iter->next;
            $prev = $dummyHead;

            while($prev->next->val < $target->val) {
                $prev = $prev->next;
            }
            $temp = $prev->next;
            $prev->next = $target;
            $iter->next = $target->next;
            $target->next = $temp;
        }
        else {
            $iter = $iter->next;
        }
    }

    return $dummyHead->next;
}



function sortingListMergeSortFast($node) {
    if (!$node || !$node->next) return $node;

    $preSlow = null;
    $slow = $node;
    $fast = $node;

    while ($fast && $fast->next) {
        $preSlow = $slow;
        $fast = $fast->next->next;
        $slow = $slow->next;
    }

    $preSlow->next = null;

    return mergeLinkedList(sortingListMergeSortFast($node),
        sortingListMergeSortFast($slow));
}
