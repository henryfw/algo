public class LargeNumber {
    String number;

    public LargeNumber(String number) {
        this.number = number;
    }

    public LargeNumber add(LargeNumber other) {
        String shortest = (other.number.length() < number.length()) ? other.number : number;
        String longest = (shortest.equals(number)) ? other.number : number;
        int[] sum = new int[longest.length() + 1];
        for (int i = longest.length() - 1; i >= 0; i--) {
            int boost = longest.length() - shortest.length();
            sum[i + 1] += (i - boost < 0) ? longest.charAt(i) - (int) '0' : ((int) longest.charAt(i) - (int) '0') + ((int) shortest.charAt(i - boost) - (int) '0');
            if (sum[i + 1] > 9) {
                sum[i] = 1;
                sum[i + 1] -= 10;
            }
        }
        String result = java.util.Arrays.toString(sum);
        result = result.replace(",", "").replace("]", "").replace("[", "").replace(" ", "");
        if (result.charAt(0) == '0') result = result.substring(1);
        return new LargeNumber(result);
    }
}

