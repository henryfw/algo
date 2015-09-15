class Global:
    counter = 0

def combination(inputs, size, combinations=[]):

    if len(combinations) == 0:
        for i in inputs:
            combinations.append([i])

    if size == 1:
        return combinations

    newCombinations = []

    for combo in combinations:
        for i in inputs:
            Global.counter += 1
            if i not in combo:
                newCombo = combo[:]
                newCombo.append(i)
                newCombinations.append(newCombo)


    return combination(inputs, size - 1, newCombinations)





print combination([1,2,3], 3)
print Global.counter
