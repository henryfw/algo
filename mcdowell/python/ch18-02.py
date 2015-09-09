import random

def shuffleDeck(inputs):

    for i in range(len(inputs)):
        k = random.randint(0, i)
        # print k
        tmp = inputs[k]
        inputs[k] = inputs[i]
        inputs[i] = tmp

for i in range(100):
    a = [1,2,3,4,5,6,7]
    shuffleDeck(a)
    print a