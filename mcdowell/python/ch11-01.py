def merge(left, right):
    rightCount = len(right)
    leftCount = len(left) - rightCount


    leftIndex = leftCount - 1
    rightIndex = rightCount - 1

    totalCount = leftCount + rightCount

    counter = 0


    while leftIndex >= 0 and rightIndex >= 0:
        if right[rightIndex] > left[leftIndex]:
            left[totalCount - 1 - counter] = right[rightIndex]

            rightIndex -= 1
        else:
            left[totalCount - 1 - counter] = left[leftIndex]
            leftIndex -= 1

        counter += 1


    while rightIndex >= 0:
        left[totalCount - 1 - counter] = right[rightIndex]
        rightIndex -= 1
        counter += 1


    return left



left = [10, 11, 20, 40, 50, 0, 0, 0, 0, 0, 0]
right = [14, 14, 51, 99, 100, 100]

print merge(left, right)