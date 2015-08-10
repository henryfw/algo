

def bubble_sort(inputs):

    for i in range(len(inputs)-1, -1, -1):
        for j in range(0, i):
            if inputs[j] > inputs[j + 1] :
                swap(inputs, j, j + 1)





def swap(inputs, i, j) :
    tmp = inputs[i]
    inputs[i] = inputs[j]
    inputs[j] = tmp



if __name__ == '__main__':
    inputs = [
        1, 23, 4, 434, 232, 324, 11, 2323, 5
    ]
    bubble_sort(inputs)
    print inputs