from recorder import Recorder
record = Recorder()

# returns sorted, not in place
def merge_sort(inputs) :
    if len(inputs) <= 1:
        return inputs

    left = []
    right = []

    mid = len(inputs) // 2

    for i in range(0, mid):
        left.append(inputs[i])
    for i in range(mid, len(inputs)):
        right.append(inputs[i])

    left = merge_sort(left)
    right = merge_sort(right)

    result = merge(left, right)
    record.add(result)
    return result






def merge(left, right) :
    result = []

    left_index = 0
    right_index = 0

    left_len = len(left)
    right_len = len(right)

    while left_index < left_len and right_index < right_len:
        if left[left_index] <= right[right_index]:
            result.append(left[left_index])
            left_index += 1
        else :
            result.append(right[right_index])
            right_index += 1

    while left_index < left_len:
        result.append(left[left_index])
        left_index += 1

    while right_index < right_len:
        result.append(right[right_index])
        right_index += 1

    return result



if __name__ == '__main__':
    inputs = [
        1, 23, 4, 434, 232, 324, 11, 2323, 5
    ]
    result = merge_sort(inputs)
    #print result
    record.show()