
def countTwo(n):
    count = 0
    for i in range(2, n + 1):
        x = i
        while x > 1:
            if x % 10 == 2:
                count += 1
            x = x / 10
    return count



print countTwo(22)