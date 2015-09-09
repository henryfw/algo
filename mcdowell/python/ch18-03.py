import random

def pickRandomSubset(inputs, m):
    subset = inputs[0:m]

    for i in range(m, len(inputs)):
        k = random.randint(0, i)
        if k < m:
            subset[k] = inputs[i]

    return subset


for i in range(100):
    print pickRandomSubset([1,2,3,4,5], 3)
