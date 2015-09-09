

def printPairSums(inputs, target):

    first = 0
    last = len(inputs) - 1
    inputs.sort()
    result = []

    while first < last:
        sum = inputs[first] + inputs[last]

        if sum == target:
            result.append([inputs[first], inputs[last]])
            first += 1
            last += 1
        else:
            if sum > target:
                last -= 1
            else:
                first += 1

    return result




print (printPairSums([1,2,3,4,5,6,7,8,9,10], 10))