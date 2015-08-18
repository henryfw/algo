#
# The code below uses a linear
# scan to find the unfinished node
# with the smallest distance from
# the source.
#
# Modify it to use a heap instead
#

class MinHeap:
    currentMaxSize = 10
    size = 0
    data = [-1 for i in range(currentMaxSize)]
    payloadToHeapIndexMap = {}

    def add(self, key, payload):
        if self.size == self.currentMaxSize:
            # resize
            self.data.extend( [-1 for i in range(self.currentMaxSize)] )
            self.currentMaxSize *= 2

        self.size += 1
        self.data[self.size - 1] = {'key': key, 'payload': payload}
        self.payloadToHeapIndexMap[payload] = self.size - 1
        return self.siftUp(self.size - 1)


    def getMin(self):
        if self.size == 0:
            return None
        return self.data[0]

    def removeMin(self):
        if self.size == 0:
            return None

        del self.payloadToHeapIndexMap[self.data[0]['payload']]
        #print "call del %s" % self.data[0]['payload']
        #print self.payloadToHeapIndexMap
        self.data[0] = -1
        self.size -= 1

        if self.size > 0:
            self.data[0] = self.data[self.size]
            self.payloadToHeapIndexMap[self.data[0]['payload']] = 0
            self.data[self.size] = -1
            self.siftDown(0)


    def siftUp(self, index):

        if index == 0:
            return 0
        parentIndex = self.getParentIndex(index)
        if self.data[parentIndex]['key'] > self.data[index]['key']:
            self.payloadToHeapIndexMap[self.data[index]['payload']], \
                self.payloadToHeapIndexMap[self.data[parentIndex]['payload']] = \
                self.payloadToHeapIndexMap[self.data[parentIndex]['payload']], \
                self.payloadToHeapIndexMap[self.data[index]['payload']]
            self.data[index], self.data[parentIndex] = self.data[parentIndex], self.data[index]
            return self.siftUp(parentIndex)
        return index


    def siftDown(self, index):
        #print 'siftDown %d' % index
        indexToUse = -1
        leftIndex = self.getLeftIndex(index)
        rightIndex = self.getRightIndex(index)

        if rightIndex is not None:
            if self.data[rightIndex]['key'] < self.data[leftIndex]['key']:
                indexToUse = rightIndex
            else:
                indexToUse = leftIndex
        elif leftIndex is not None:
            indexToUse = leftIndex

        if indexToUse != -1 and self.data[index]['key'] > self.data[indexToUse]['key']:
            self.payloadToHeapIndexMap[self.data[index]['payload']], self.payloadToHeapIndexMap[self.data[indexToUse]['payload']] = \
                self.payloadToHeapIndexMap[self.data[indexToUse]['payload']], self.payloadToHeapIndexMap[self.data[index]['payload']]
            self.data[index], self.data[indexToUse] = self.data[indexToUse], self.data[index]
            self.siftDown(indexToUse)

    def updateAtIndex(self, index, key, payload):
        self.data[index] = {'key' : key, 'payload': payload}
        return self.siftUp(index)

    def getAtIndex(self, index):
        if index >= self.size:
            raise ValueError("Index is too high.")
        return self.data[index]


    def getParentIndex(self, index):
        return (index - 1) // 2

    def getLeftIndex(self, index):
        val = (index * 2) + 1
        return val if val < self.size else None

    def getRightIndex(self, index):
        val = (index * 2) + 2
        return val if val < self.size else None

    def __str__(self):
        value = "heap = {"
        for i in range(self.size):
            value += self.data[i]['payload'] + ' (' + str(i) + '): ' + str(self.data[i]['key']) + ', '
        value += "}\npayloadMap = " + str(self.payloadToHeapIndexMap)
        return value



def dijkstra(G,v):
    final_dist = {}

    heap = MinHeap()
    heap.add(0, v)

    while len(final_dist) < len(G):
        minItem = heap.getMin()

        w = minItem['payload']
        # lock it down!
        final_dist[w] = minItem['key']

        #print 'removing %s: %d' % (minItem['payload'], minItem['key'])

        heap.removeMin()

        #print str(heap)

        for x in G[w]:
            if x not in final_dist:
                if x not in heap.payloadToHeapIndexMap:
                    #print 'adding %s: %d' % (x, final_dist[w] + G[w][x])
                    heap.add(final_dist[w] + G[w][x], x)
                    #print str(heap)
                elif final_dist[w] + G[w][x] < heap.getAtIndex(heap.payloadToHeapIndexMap[x])['key']:
                    #print 'upding %s: %d' % (x, final_dist[w] + G[w][x])
                    heap.updateAtIndex(heap.payloadToHeapIndexMap[x], final_dist[w] + G[w][x], x)
                    #print str(heap)
    return final_dist


############
#
# Test

def make_link(G, node1, node2, w):
    if node1 not in G:
        G[node1] = {}
    if node2 not in G[node1]:
        (G[node1])[node2] = 0
    (G[node1])[node2] += w
    if node2 not in G:
        G[node2] = {}
    if node1 not in G[node2]:
        (G[node2])[node1] = 0
    (G[node2])[node1] += w
    return G


def test():
    # shortcuts
    (a,b,c,d,e,f,g) = ('A', 'B', 'C', 'D', 'E', 'F', 'G')
    triples = ((a,c,3),(c,b,10),(a,b,15),(d,b,9),(a,d,4),(d,f,7),(d,e,3),
               (e,g,1),(e,f,5),(f,g,2),(b,f,1))
    G = {}
    for (i,j,k) in triples:
        make_link(G, i, j, k)

    dist = dijkstra(G, a)
    #print dist
    assert dist[g] == 8 #(a -> d -> e -> g)
    assert dist[b] == 11 #(a -> d -> e -> g -> f -> b)

    #print dist


test()

