import pprint

def rotate(matrix):

    width = len(matrix)

    # layer = vertical column
    for layer in range(width // 2):
        first = layer
        last = width - 1 - layer
        for i in range(first, last):
            offset = i - first

            top = matrix[first][i]

            # left to top
            matrix[first][i] = matrix[last - offset][first]

            # bottom to left
            matrix[last - offset][first] = matrix[last][last - offset]







pprint.pprint(rotate([
    [1,2,3,4,5], # left-most vertical column
    [1,2,3,4,5], # 2nd column
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5], # last vertical column
]))