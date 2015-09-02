def magicFast(inputs, start, stop):
    if start > stop or start < 0 or stop > len(inputs) - 1:
        return -1

    mid = (start + stop) // 2
    midValue = inputs[mid]

    if midValue == mid:
        return mid

    left = magicFast(inputs, start, min([mid - 1, midValue]))
    if left >= 0:
        return left

    right = magicFast(inputs, max([mid + 1, midValue]), stop)

    return right


inputs = [-10, -10, 0, 3, 3, 3, 3, 10, 11, 12]
print magicFast(inputs, 0, len(inputs) - 1)