<?php

function collatzConjecture($n) {

    $verified = [];

    for ($i = 2; $i < $n; $i ++ ) {
        $sequence = [];
        $testI = $i;
        while ($testI >= $i) {

            if (isset($sequence[$testI])) return false;

            if (($testI %2) != 0) {
                if (isset($verified[$testI])) break;

                $nextTestI = 3 * $testI + 1;

                if ($nextTestI <= $testI) {
                    throw new Exception("overflow");
                }

                $testI = $nextTestI;


            }
            else {
                $testI /= 2;
            }
        }
    }
    return true;
}


/*
 * public static boolean testCollatzConjecture(int n) {
    // Stores odd numbers already tested to converge to 1.
    Set<Long> verifiedNumbers = new HashSet<>();

    // Starts from 2, since hypothesis holds trivially for 1.
    for (int i = 2; i <= n; ++i) {
      Set<Long> sequence = new HashSet<>();
      long testI = i;
      while (testI >= i) {
        if (!sequence.add(testI)) {
          // We previously encountered testI, so the Collatz sequence
          // has fallen into a loop. This disproves the hypothesis, so
          // we short-circuit, returning false.
          return false;
        }

        if ((testI % 2) != 0) { // Odd number
          if (!verifiedNumbers.add(testI)) {
            break; // testI has already been verified to converge to 1.
          }
          long nextTestI = 3 * testI + 1; // Multiply by 3 and add 1.
          if (nextTestI <= testI) {
            throw new ArithmeticException("Collatz sequence overflow for " + i);
          }
          testI = nextTestI;
        } else {
          testI /= 2; // Even number, halve it.
        }
      }
    }
    return true;
  }

 */