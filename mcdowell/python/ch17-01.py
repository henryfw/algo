def swapNumbers(items):
    items[0] = items[0] - items[1]
    items[1] = items[1] + items[0]
    items[0] = items[1] - items[0]


inputs = [5, 10]
swapNumbers(inputs)
print inputs