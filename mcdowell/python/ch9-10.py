cache = {}
G = {
    'counter': 0
}

def createStack(boxes, bottom):

    if bottom in cache:
        return cache[bottom]

    G['counter'] += 1

    maxHeight = 0
    maxStack = []

    for i in range(len(boxes)):
        if boxes[i] > bottom:
            newStack = createStack(boxes, boxes[i])
            newHeight = sum(newStack)

            if newHeight > maxHeight:
                maxHeight = newHeight
                maxStack = newStack


    maxStack.insert(0, bottom)
    cache[bottom] = maxStack
    return maxStack




print createStack([1,2,3,4,5], 1)
print G['counter']