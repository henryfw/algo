


def insertionSort(inputs):
    l = len(inputs)
    for i in range(1, l):
        pivotValue = inputs[i]
        toSwapIndex = i
        for j in range(i - 1, -1, -1):
            if inputs[j] > pivotValue:
                inputs[j + 1] = inputs[j]
                toSwapIndex = j
            else:
                break
        inputs[toSwapIndex] = pivotValue



inputs = [10,5,2,1,99]

insertionSort(inputs)

print inputs