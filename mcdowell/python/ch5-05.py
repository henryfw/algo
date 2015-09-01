def bitSwapRequired(a, b):

    count = 0
    c = a ^ b
    while c != 0:
        count += c & 1 # if c == 1: count += 1
        c = c >> 1
    return count



# print bin( 0b1101 ^ 0b1111 )

print bitSwapRequired( 0b1101 , 0b1111 )