import pprint

def rotate(matrix):

    width = len(matrix)

    # layer = vertical column
    for layer in range(width // 2):
        first = layer
        last = width - 1 - layer
        for i in range(first, last):
            offset = i - first

            # top
            matrix[first][i]

            # right
            matrix[i][last]

            #bottom
            matrix[last][last - offset]

            #left
            matrix[last - offset][first]



            top = matrix[first][i]

            # top <- left
            matrix[first][i] = matrix[last - offset][first]

            # left <- bottom
            matrix[last - offset][first] = matrix[last][last - offset]

            # bottom <- right
            matrix[last][last - offset] = matrix[i][last]

            # right <- top
            matrix[i][last] = top



# reads as ans[y][x]
ans = [
    [1,2,3,4,5], # 1st row
    [1,2,3,4,5], # 2nd row
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5],
]
rotate(ans)
pprint.pprint(ans)