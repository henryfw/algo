import java.util.*;


public class Test {

    static public ArrayList<ArrayList<Integer>> fourSum(int[] num, int target) {
        Arrays.sort(num);

        HashSet<ArrayList<Integer>> hashSet = new HashSet<ArrayList<Integer>>();
        ArrayList<ArrayList<Integer>> result = new ArrayList<ArrayList<Integer>>();

        for (int i = 0; i < num.length; i++) {
            for (int j = i + 1; j < num.length; j++) {
                int k = j + 1;
                int l = num.length - 1;

                System.out.println(i + " " + j + " " + k + " " + l);

                while (k < l) {
                    int sum = num[i] + num[j] + num[k] + num[l];


                    if (sum > target) {
                        l--;
                    } else if (sum < target) {
                        k++;
                    } else if (sum == target) {
                        ArrayList<Integer> temp = new ArrayList<Integer>();
                        temp.add(num[i]);
                        temp.add(num[j]);
                        temp.add(num[k]);
                        temp.add(num[l]);

                        if (!hashSet.contains(temp)) {
                            hashSet.add(temp);
                            result.add(temp);
                        }

                        k++;
                        l--;
                    }
                }
            }
        }

        return result;
    }

    public static void main(String[] args) {
        ArrayList<ArrayList<Integer>> ans = fourSum(new int[]{1,0,-1,0,-2,2}, 0);

        for(ArrayList<Integer> items: ans) {
            System.out.println(Arrays.deepToString(
                    items.toArray()
            ));
        }

    }
}