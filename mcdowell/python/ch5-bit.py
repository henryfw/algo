

def getBit(n, i):
    return n & (1 << i)

def setBit(n, i):
    return n | (1 << i)


def clearBit(n, i):
    return n & ~ (1 << i)

# inclusive
def clearBitGreaterThanI(n, i):
    return n & ((1 << i ) - 1)


def clearBitLessThanI(n, i):
    return n & ~((1 << (i+1)) - 1)

def updateBit(n, i, v):
    ans = n & ~(1 << i)
    if v:
        ans |= (1 << i)
    return ans


print bin(getBit(0b1101, 1))
print bin(setBit(0b1101, 1))
print bin(clearBit(0b1101, 2))
print bin(clearBitGreaterThanI(0b1101, 1))
print bin(clearBitLessThanI(0b1101, 2))
print bin(updateBit(0b1101, 4, 1))