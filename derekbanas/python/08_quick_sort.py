from recorder import Recorder
record = Recorder()


def quick_sort(inputs):
    quick_sort_body(inputs, 0, len(inputs) - 1)


def quick_sort_body(inputs, left, right):
    start = left
    end = right
    if left < right:
        pivot = inputs[right]
        while left <= right:
            while inputs[left] < pivot:
                left += 1
            while inputs[right] > pivot:
                right -= 1

            if left <= right:
                tmp = inputs[left]
                inputs[left] = inputs[right]
                inputs[right] = tmp
                left += 1
                right -= 1

        record.add(inputs)
        # print "left: %d to %d, right: %d to %d" % (start, right, left, end)
        quick_sort_body(inputs, start, right)
        quick_sort_body(inputs, left, end)


if __name__ == '__main__':
    inputs = [
        1, 23, 4, 434, 232, 324, 11, 2323, 5
    ]
    quick_sort(inputs)
    record.show()

    # first pass: pivot = 5
    # 1, 5, 4, <break here for next pass> 434, 232, 324, 11, 2323, 23



