

def longPrecisionMultiply(a, b):
    neg = (a[0] < 0 and b[0] >= 0) or (a[0] >= 0 and b[0] < 0)

    a[0] = abs(a[0])
    b[0] = abs(b[0])

    a.reverse()
    b.reverse()

    result = [0 for i in range(len(a) + len(b) + 2)]

    for i in range(0, len(a)):
        for j in range(0, len(b)):
            result[i + j] += a[i] * b[j]
            result[i + j + 1] +=  int( result[i + j] / 10 )
            result[i + j] %= 10

    while len(result) != 1 and result[-1] == 0:
        result.pop()

    result.reverse()

    if neg:
        result *= -1

    return result



print longPrecisionMultiply([2,5], [1,0])
