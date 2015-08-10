from random import shuffle

from recorder import Recorder
record = Recorder()

# the easier to understand double for-loop with one extra space needed to store index way
def insertion_sort(inputs):
    for i in range(1, len(inputs)):
        to_insert_value = inputs[i]
        to_swap_index = i
        for j in range(i - 1, -1, -1):
            if inputs[j] > to_insert_value:
                to_swap_index = j
                inputs[j+1] = inputs[j]
            else:
                break

        inputs[to_swap_index] = to_insert_value
        record.add(inputs)


# the text book way with inner while loop
def insertion_sort_2(inputs) :
    for i in range(1, len(inputs)) :
        to_insert_value = inputs[i]
        j = i
        while j > 0 and inputs[j - 1] > to_insert_value :
            inputs[j] = inputs[j - 1]
            j -= 1

        inputs[j] = to_insert_value
        record.add(inputs)



if __name__ == '__main__':
    inputs = [
        1, 23, 4, 434, 232, 324, 11, 2323, 5
    ]
    insertion_sort(inputs)
    record.show()

    record.clear()
    print ""

    shuffle(inputs)
    insertion_sort_2(inputs)
    record.show()