<?php

function subsetSizeK($inputs, $k) {
    $ans = [];
    $partialCombination = [];
    helper($inputs, $k, 0, $partialCombination, $ans);
}


function helper($inputs, $k, $offset, &$partialCombination, &$ans) {
    if (count($partialCombination) == $k) {
        $ans[] = $partialCombination;
        return;
    }

    $numRemaining = $k - count($partialCombination);

    for( $i = $offset; $i < count($inputs) && $numRemaining < count($inputs) - $i + 1; $i ++  ) {
        $partialCombination[] = $inputs[$i];
        helper($inputs, $k, $i + 1, $partialCombination, $ans);
        array_pop($partialCombination);
    }
}


/*
 * // @include
  public static List<List<Integer>> combinations(int n, int k) {
    List<List<Integer>> result = new ArrayList<>();
    List<Integer> partialCombination = new ArrayList<>();
    directedCombinations(n, k, 1, partialCombination, result);
    return result;
  }

  private static void directedCombinations(int n, int k, int offset,
                                           List<Integer> partialCombination,
                                           List<List<Integer>> result) {
    if (partialCombination.size() == k) {
      result.add(new ArrayList<>(partialCombination));
      return;
    }

    // Generate remaining combinations over {offset, ..., n - 1} of size
    // numRemaining.
    final int numRemaining = k - partialCombination.size();
    for (int i = offset; i <= n && numRemaining <= n - i + 1; ++i) {
      partialCombination.add(i);
      directedCombinations(n, k, i + 1, partialCombination, result);
      partialCombination.remove(partialCombination.size() - 1);
    }
  }
  // @exclude
 */