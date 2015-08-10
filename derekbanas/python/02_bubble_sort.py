

def bubble_sort(input):

    for i in range(len(input)-1, -1, -1):
        for j in range(0, i):
            if input[j] > input[j + 1] :
                swap(input, j, j + 1)





def swap(input, i, j) :
    tmp = input[i];
    input[i] = input[j];
    input[j] = tmp



if __name__ == '__main__':
    input = [
        1, 23, 4, 434, 232, 324, 11, 2323, 5
    ]
    bubble_sort(input)
    print input