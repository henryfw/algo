

def rotate_array(arr, k):
    length = len(arr)
    result = [0 for i in arr]
    for i in range(length):
        result[(i + k) % length] = arr[i]

    return result





if __name__ == '__main__':
    inputs = [
        1,2,3,4,5,6,7,8,9
    ]
    print rotate_array(inputs, 3)