def getAllSubSet(inputs, index):
    if index < 0:
        return [[]]

    ans = getAllSubSet(inputs, index - 1)
    newAns = ans[:]

    newInputValue = inputs[index]

    for v in ans:
        newV = v[:]
        newV.append(newInputValue)
        newAns.append(newV)

    return newAns



print getAllSubSet([1,2,3], 2)