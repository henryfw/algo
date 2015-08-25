import java.util.*;


public class MatrixRotate {


    static public void rotate(int[][] matrix) {
        int n = matrix[0].length;
        for (int layer = 0; layer < n / 2; ++layer) {
            int first = layer;
            int last = n - 1 - layer;

            System.out.println("first " + first);
            System.out.println("last " + last);

            for (int i = first; i < last; ++i) {
                int offset = i - first;


                System.out.println();
                System.out.println("offset " + offset);

                // save top
                int top = matrix[first][i];


                // left -> top
                System.out.println("left -> top");
                System.out.println("left i,j " + (last - offset) + "," + first);
                System.out.println("top " + matrix[first][i]);
                System.out.println("top i,j " + (first) + "," + i);
                System.out.println();
                matrix[first][i] = matrix[last - offset][first];


                // bottom -> left
                System.out.println("bottom -> left");
                System.out.println("bottom i,j " + last + "," + (last - offset));
                System.out.println("left " + matrix[last - offset][first]);
                System.out.println("left i,j " + (last - offset) + "," + first);
                System.out.println();
                matrix[last - offset][first] = matrix[last][last - offset];

                // right -> bottom
                System.out.println("right -> bottom");
                System.out.println("right i,j " + (i) + "," + last);
                System.out.println("bottom " + matrix[last][last - offset]);
                System.out.println("bottom i,j " + (last) + "," + (last - offset));
                System.out.println();
                matrix[last][last - offset] = matrix[i][last];

                // top -> right
                System.out.println("top -> right");
                System.out.println("top i,j " + (first) + "," + i);
                System.out.println("right " + matrix[i][last]);
                System.out.println("top i,j " + (i) + "," + last);
                System.out.println();
                matrix[i][last] = top;
            }
        }
    }

    public static void main(String[] args) {
        int[][] ans = new int[][]{
                        {1,2,3},
                        {11,12,13},
                        {21,22,23},
                };

        rotate(ans);

        for (int[] items : ans) {
            System.out.println( Arrays.toString(items) );
        }

    }
}