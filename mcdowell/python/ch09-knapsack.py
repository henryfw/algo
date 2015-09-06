import pprint
import timeit

cache = {
    'calls' : 0,
    'savings' : 0
}

def totalValue(items, maxWeight):
    weight = 0
    value = 0
    for item in items:
        weight += item[1]
        value += item[2]
    if weight <= maxWeight:
        return value
    else:
        return 0

def hashKey(items, maxWeight):
    ans = str(maxWeight) + "|"
    for item in items:
        ans += item[0] + ","
    return ans

def knapsack(items, maxWeight):
    if len(items) == 0:
        return []

    if maxWeight <= 0:
        return items

    cacheKey = hashKey(items, maxWeight)

    if cacheKey in cache:
        cache['savings'] += 1
        return cache[cacheKey]

    cache['calls'] += 1

    head = items[0]
    tail = items[1:]

    itemsWithHead = [head] + knapsack(tail, maxWeight - head[1])
    itemsWithoutHead = knapsack(tail, maxWeight)


    if totalValue(itemsWithHead, maxWeight) > totalValue(itemsWithoutHead, maxWeight):
        ans = itemsWithHead
    else:
        ans = itemsWithoutHead

    cache[cacheKey] = ans

    return ans


items = [
    ["map", 9, 150], ["compass", 13, 35], ["water", 153, 200], ["sandwich", 50, 160],
    ["glucose", 15, 60], ["tin", 68, 45], ["banana", 27, 60], ["apple", 39, 40],
    ["cheese", 23, 30], ["beer", 52, 10], ["suntan cream", 11, 70], ["camera", 32, 30],
    ["t-shirt", 24, 15], ["trousers", 48, 10], ["umbrella", 73, 40],
    ["waterproof trousers", 42, 70], ["waterproof overclothes", 43, 75],
    ["note-case", 22, 80], ["sunglasses", 7, 20], ["towel", 18, 12],
    ["socks", 4, 50], ["book", 30, 10],
]
maxWeight = 400


start = timeit.default_timer()

pprint.pprint( knapsack( items, maxWeight ) )
print "calls: " + str(cache['calls'])
print "savings: " + str(cache['savings'])

stop = timeit.default_timer()

print stop - start
