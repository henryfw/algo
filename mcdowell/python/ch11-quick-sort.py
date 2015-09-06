def quickSort(inputs, left = 0, right = None):

    if right is None:
        right = len(inputs) - 1

    if left >= right:
        return


    start = left
    stop = right

    pivot = inputs[right]

    while left <= right:
        while inputs[left] < pivot:
            left += 1
        while inputs[right] > pivot:
            right -= 1

        if left <= right:
            tmp = inputs[right]
            inputs[right] = inputs[left]
            inputs[left] = tmp
            left += 1
            right -= 1

    quickSort(inputs, start, right)
    quickSort(inputs, left, stop)


ans = [12,23,41,2,3,4,5,67,888]
quickSort(ans)
print ans


