
def reverseNumber(n):
    neg = False
    if n < 0:
        neg = True
        n = - n

    ans = 0

    while n > 0:
        ans = ans * 10 + (n % 10)
        n = n / 10

    return ans if not neg else - ans

print reverseNumber(123450)