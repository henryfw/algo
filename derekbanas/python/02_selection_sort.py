from recorder import Recorder
record = Recorder()


def selection_sort(input):
    for i in range(0, len(input)) :
        smallest = i
        for j in range(i, len(input)) :
            if input[j] < input[smallest] :
                smallest = j
        swap(input, i, smallest)
        record.add(input[:])





def swap(input, i, j) :
    tmp = input[i];
    input[i] = input[j];
    input[j] = tmp



if __name__ == '__main__':
    input = [
        1, 23, 4, 434, 232, 324, 11, 2323, 5
    ]
    selection_sort(input)
    #print input
    record.show()