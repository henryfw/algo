def add(a, b):
    if b == 0:
        return a

    total = a ^ b
    carry = (a & b) << 1

    return add(total, carry)




print add(55, 101)