def power(x, y):

    result = 1
    p = y
    while p > 0:
        if p & 1:
            result *= x
        x *= x
        p >>= 1

    return result




print power(5,3)
