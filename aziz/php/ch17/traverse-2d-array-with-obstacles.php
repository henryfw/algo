<?php
error_reporting(E_ALL & ~E_NOTICE);



function traverse2dArrayWithObstacles($n, $m, $B) {

    if ($B[0][0]) return 0;

    $A = [];
    
    for ($i = 0; $i < $n; $i++) {
        $A[] = array_fill(0, $m, 0);
    }
    
    $A[0][0] = 1;
    
    for ($i = 0; $i < $n; $i ++ ) {
        for ($j = 0; $j < $n; $j ++ ) {
            if (!$B[$i][$j]) {
                $A[$i][$j] = $A[$i][$j] + ( $i < 1 ? 0 : $A[$i - 1][$j]) +
                    ($j < 1 ? 0 : $A[$i][$j-1]);
            }
        }
    }

    return $A[$n-1][$m-1];
}

/*
 * // @include
  // Given the dimensions of A, n and m, and B, return the number of ways
  // from A.get(0).get(0) to A.get(n - 1).get(m - 1) considering obstacles.
  public static int numberOfWaysWithObstacles(int n, int m,
                                              List<List<Boolean>> B) {
    // No way to start from (0, 0) if B.get(0).get(0) == true.
    if (B.get(0).get(0)) {
      return 0;
    }

    List<List<Integer>> A = new ArrayList<>(n);
    for (int i = 0; i < n; ++i) {
      A.add(new ArrayList<>(Collections.nCopies(m, 0)));
    }
    A.get(0).set(0, 1);
    for (int i = 0; i < n; ++i) {
      for (int j = 0; j < m; ++j) {
        if (!B.get(i).get(j)) {
          A.get(i).set(j, A.get(i).get(j) + (i < 1 ? 0 : A.get(i - 1).get(j))
                              + (j < 1 ? 0 : A.get(i).get(j - 1)));
        }
      }
    }
    return A.get(n - 1).get(m - 1);
  }
  // @exclude
 */