<?php

function maximizeFishing($A) {
    for ($i = 0; $i < count($A); $i ++) {
        for ($j = 0; $j < count($A[0]); $j ++) {
            $A[$i][$j] = $A[$i][$j] + max($i < 1 ? 0 : $A[$i-1][$j], $j < 1 ? 0 : $A[$i][$j - 1]);
        }
    }
    return end(end($A));
}

/*
 *
  // @include
  public static int maximizeFishing(List<List<Integer>> A) {
    for (int i = 0; i < A.size(); ++i) {
      for (int j = 0; j < A.get(i).size(); ++j) {
        A.get(i).set(j, A.get(i).get(j)
                            + Math.max(i < 1 ? 0 : A.get(i - 1).get(j),
                                       j < 1 ? 0 : A.get(i).get(j - 1)));
      }
    }
    return A.get(A.size() - 1).get(A.get(0).size() - 1);
  }
  // @exclude
 */