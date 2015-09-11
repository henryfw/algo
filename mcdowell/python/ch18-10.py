

def transform(startWord, endWord, dictionary):
    startWord = startWord.upper()
    endWord = endWord.upper()

    openList = [startWord]
    visited = {}
    visited[startWord] = True
    backtrack = {}

    while len(openList) > 0:
        word = openList.pop(0)
        for v in getNearbyWords(word, dictionary):
            if v == endWord:
                ans = [endWord]

                while word in backtrack:
                    ans.insert(0, backtrack[word])
                    word = backtrack[word]
                return ans


            if v not in visited:
                visited[v] = True
                backtrack[v] = word
                openList.append(v)

    return None


def getNearbyWords(word, dictionary):
    ans = []
    for i in range(len(word)):
        wordArray = [x for x in word]
        startChar = ord('A')
        endChar = ord('Z')
        for c in range(startChar, endChar + 1):
            char = chr(c)
            if char != word[i]:
                wordArray[i] = char
                newWord = "".join(wordArray)
                if newWord in dictionary:
                    ans.append(newWord)

    return ans



dictionary = {"ABC":1,"ABB":1,"BBB":1,"BCA":1,"CCA":1,"CAB":1,"AAA":1,"AAB":1}
print transform("BBB", "AAA", dictionary)


# print getNearbyWords("ABC", dictionary)