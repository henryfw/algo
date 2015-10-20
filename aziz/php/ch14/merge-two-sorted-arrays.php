<?php


// $a has empty space in end
function mergeTwoSortedArraysInPlace(&$a, $aSize, $b, $bSize) {
    $aEnd = $aSize - 1;
    $bEnd = $bSize - 1;
    $writeIndex = $aSize + $bSize - 1;

    while ($aEnd >= 0 && $bEnd >= 0) {
        $a[$writeIndex --] = $a[$aEnd] > $b[$bEnd] ? $a[$aEnd --] : $b[$bEnd --];
    }
    while ($bEnd >= 0) {
        $a[$writeIndex --] = $b[$bEnd --];
    }
}


$a = [1,2,3,4,5,6,null,null,null];
$b = [3,4,7];


mergeTwoSortedArraysInPlace($a, 6, $b, 3);
print_r($a);

/*
 *   // @include
  public static void mergeTwoSortedArrays(int A[], int m, int B[], int n) {
    int a = m - 1, b = n - 1, writeIdx = m + n - 1;
    while (a >= 0 && b >= 0) {
      A[writeIdx--] = A[a] > B[b] ? A[a--] : B[b--];
    }
    while (b >= 0) {
      A[writeIdx--] = B[b--];
    }
  }
  // @exclude

 */