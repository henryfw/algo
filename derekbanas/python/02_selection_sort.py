from recorder import Recorder
record = Recorder()


def selection_sort(inputs):
    for i in range(0, len(inputs)) :
        smallest = i
        for j in range(i, len(inputs)) :
            if inputs[j] < inputs[smallest] :
                smallest = j
        swap(inputs, i, smallest)
        record.add(inputs)





def swap(inputs, i, j) :
    tmp = inputs[i];
    inputs[i] = inputs[j];
    inputs[j] = tmp



if __name__ == '__main__':
    inputs = [
        1, 23, 4, 434, 232, 324, 11, 2323, 5
    ]
    selection_sort(inputs)
    #print inputs
    record.show()