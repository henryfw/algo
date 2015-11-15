def searchInsertPosition(A, target):
    if len(A) == 0 or target < A[0]:
        return 0

    left = 0
    right = len(A) - 1

    while left < right:
        mid = (right + left) // 2

        if A[mid] == target:
            return mid

        elif target < A[mid]:
            right = mid - 1

        else:
            left = mid + 1

    return left + 1


print searchInsertPosition([1,3,5,6], 5)
print searchInsertPosition([1,3,5,6], 2)
print searchInsertPosition([1,3,5,6], 7)
print searchInsertPosition([1,3,5,6], 0)





