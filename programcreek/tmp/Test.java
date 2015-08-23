public class Test {



    public static void rotate(int[] arr, int order) {
        if (arr == null || order < 0) {
            throw new IllegalArgumentException("Illegal argument!");
        }

        for (int i = 0; i < order; i++) {
            for (int j = arr.length - 1; j > 0; j--) {
                int temp = arr[j];
                arr[j] = arr[j - 1];
                arr[j - 1] = temp;
            }
        }
    }


    public static void main(String[] args) {
        int[] inputs = new int[]{1,2,3,4,5,6,7,8,9};
        rotate(inputs, 3);

        System.out.println(inputs[0]);
    }
}