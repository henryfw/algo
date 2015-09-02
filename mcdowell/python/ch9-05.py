def permutation(text, index):
    if index == 0:
        return [text[0]]

    ans = permutation(text, index - 1)
    newAns = ans[:]
    newLetter = text[index]

    for item in ans:
        for i in range(0, len(item) + 1):
            newItem = item[0:i] + newLetter + item[i:]
            newAns.append(newItem)


    return newAns



print permutation('abc', 2)