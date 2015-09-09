import java.util.*;


public class Result {
    public int invalid = Integer.MAX_VALUE;
    public String parsed = "";
    public String sentence = "asdfbcdasdf";
    public Dictionary dictionary;
    {
        dictionary = new Dictionary();
    }
    public Result(int inv, String p) {
        invalid = inv;
        parsed = p;
    }

    public Result clone()

    {
        return new Result(this.invalid, this.parsed);
    }

    public static Result min(Result r1, Result r2) {
        if (r1 == null) {
            return r2;
        } else if (r2 == null) {
            return r1;
        }
        return r2.invalid < r1.invalid ? r2 : r1;
    }


    public Result parse(int wordStart, int wordEnd, Hashtable<Integer, Result> cache) {
        if (wordEnd >= sentence.length()) {
            return new Result(wordEnd - wordStart,
                    sentence.substring(wordStart).toUpperCase());
        }
        if (cache.containsKey(wordStart)) {
            return cache.get(wordStart).clone();
        }
        String currentWord = sentence.substring(wordStart, wordEnd + 1);
        boolean validPartial = dictionary.contains(currentWord, false);
        boolean validExact = validPartial &&
                dictionary.contains(currentWord, true);

/* break current word */
        Result bestExact = parse(wordEnd + 1, wordEnd + 1, cache);
        if (validExact) {
            bestExact.parsed = currentWord + " " + bestExact.parsed;
        } else {
            bestExact.invalid += currentWord.length();
            bestExact.parsed = currentWord.toUpperCase() + " " +
                    bestExact.parsed;
        }
        /*extend current word */
        Result bestExtend = null;
        if (validPartial) {
            bestExtend = parse(wordStart, wordEnd + 1, cache);
        }

        Result best = Result.min(bestExact, bestExtend);
        cache.put(wordStart, best.clone());
        return best;
    }

    static public void main(String[] args) {
        Result test = new Result(2, "bcdasdfbcdasdf");
        System.out.println(test.parse(0, 10, new Hashtable<Integer, Result>() ) );

    }

}

class Dictionary {
    ArrayList<String> words;
    {
        words = new ArrayList<>();
        words.add("asdf");
    }
    public boolean contains(String word, boolean flag) {
        return words.contains(word);
    }
}