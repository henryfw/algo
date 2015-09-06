def mergeSort(inputs):
    if len(inputs) <= 1:
        return inputs

    mid = len(inputs) // 2

    left = mergeSort(inputs[0:mid])
    right = mergeSort(inputs[mid:])
    return merge(left, right)


def merge(left, right):
    ans = []
    leftIndex = 0
    rightIndex = 0
    leftCount = len(left)
    rightCount = len(right)

    while leftIndex < leftCount and rightIndex < rightCount:
        if left[leftIndex] <= right[rightIndex]:
            ans.append(left[leftIndex])
            leftIndex += 1
        else:
            ans.append(right[rightIndex])
            rightIndex += 1

    while leftIndex < leftCount:
        ans.append(left[leftIndex])
        leftIndex += 1

    while rightIndex < rightCount:
        ans.append(right[rightIndex])
        rightIndex += 1

    return ans



print mergeSort([3,45,6543,2,3,4,5,6])