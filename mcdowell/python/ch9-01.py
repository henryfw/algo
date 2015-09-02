

def countWays(n, map):
    if n < 0:
        return 0
    elif n == 0:
        return 1
    else:
        if n in map:
            return map[n]
        else:
            ans = countWays(n - 1, map) + countWays(n - 2, map) + countWays(n - 3, map)
            map[n] = ans
            return ans



print countWays(100, dict())
