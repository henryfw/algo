<?php

function findAllSubstringInSentenceFromSet($sentence, $words) {

}

/*
 public static List<Integer> findAllSubstrings(String s, String[] words) {
    Map<String, Integer> dict = new HashMap<>();
    for (String word : words) {
      increment(word, dict);
    }

    int unitSize = words[0].length();
    List<Integer> result = new ArrayList<>();
    for (int i = 0; i + unitSize * words.length <= s.length(); ++i) {
      if (matchAllWordsInDict(s, dict, i, words.length, unitSize)) {
        result.add(i);
      }
    }
    return result;
  }

  private static boolean matchAllWordsInDict(String s, Map<String, Integer> dict,
                                             int start, int numWords,
                                             int unitSize) {
    Map<String, Integer> currDict = new HashMap<>();
    for (int i = 0; i < numWords; ++i) {
      String currWord =
          s.substring(start + i * unitSize, start + (i + 1) * unitSize);
      Integer iter = dict.get(currWord);
      if (iter == null) {
        return false;
      }
      increment(currWord, currDict);
      if (currDict.get(currWord) > iter) {
        return false;
      }
    }
    return true;
  }

  private static void increment(String word, Map<String, Integer> dict) {
    Integer count = dict.get(word);
    if (count == null) {
      count = 0;
    }
    count++;
    dict.put(word, count);
  }

 */