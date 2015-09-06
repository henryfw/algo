def findElement(matrix, target):

    row = 0
    col = len(matrix[0]) - 1


    while row < len(matrix)  and col >= 0:
        if matrix[row][col] == target:
            return row, col
        elif matrix[row][col] > target:
            col -= 1
        else:
            row += 1

    return False




print findElement([
    [1,2,3,4],
    [11,12,13,14],
    [14,15,23,24],
], 15)