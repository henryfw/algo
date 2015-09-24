<?php

// http://www.careercup.com/question?id=83756


function rotateMatrix(&$matrix) {
    $rowCount = count($matrix);

    for ($layer = 0; $layer < floor($rowCount/2); $layer ++) {
        $first = $layer;
        $last = $rowCount - 1 - $layer;

        for ($i = $first; $i < $last; $i ++) {
            $offset = $i - $first;


            // top = $matrix[$first][$i]
            // right = $matrix[$i][$last]
            // bottom = $matrix[$last][$last - $offset]
            // left = $matrix[$last - $offset][$first]


            $top = $matrix[$first][$i];

            // top <- left
            $matrix[$first][$i] = $matrix[$last - $offset][$first];

            // left <- bottom
            $matrix[$last - $offset][$first] = $matrix[$last][$last - $offset];

            // bottom <- right
            $matrix[$last][$last - $offset] = $matrix[$i][$last];

            // right <- top
            $matrix[$i][$last] = $top;

        }
    }

}
$ans = [
    [1,2,3,4,5], # 1st row
    [1,2,3,4,5], # 2nd row
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5],
];

rotateMatrix($ans);

print_r($ans);


/*
private static int[][] rotateMatrixBy90Degree(int[][] matrix, int n) {
		for (int layer = 0; layer < n / 2; layer++) {
			int first = layer;
			int last = n - 1 - layer;
			for (int i = first; i < last; i++) {
				int offset = i - first;
				int top = matrix[first][i];
				matrix[first][i] = matrix[last - offset][first];
				matrix[last - offset][first] = matrix[last][last - offset];
				matrix[last - offset][last] = matrix[i][last];
				matrix[i][last] = top;
			}
		}
		System.out.println("Matrix After Rotating 90 degree:-");
		printMatrix(matrix, n);
		return matrix;

	}
 */