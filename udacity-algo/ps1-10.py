# Find Eulerian Tour
#
# Write a function that takes in a graph
# represented as a list of tuples
# and return a list of nodes that
# you would follow on an Eulerian Tour
#
# For example, if the input graph was
# [(1, 2), (2, 3), (3, 1)]
# A possible Eulerian tour would be [1, 2, 3, 1]


# global vars
globalNodes = dict() # key is node id, value is list of connected nodes


def getEdgeId(x, y):
    return "%d-%d" % ((x, y) if x < y else (y, x))

# try dfs
def dfs(path, outgoingNodes, usedEdges, edgeTotal):
    # print path

    for node in outgoingNodes:
        edgeId = getEdgeId(node, path[-1])
        if edgeId not in usedEdges:
            # ending condition in last cycle
            if len(usedEdges) == edgeTotal - 1:
                path.append(node)
                usedEdges.append(edgeId)
                return path
            else:
                tmpUsedEdges = usedEdges[:]
                tmpUsedEdges.append(edgeId)
                tmpPath = path[:]
                tmpPath.append(node)
                result = dfs(tmpPath, globalNodes[node], tmpUsedEdges, edgeTotal)
                if result is not None:
                    return result

    return None



def find_eulerian_tour(graph):

    edgeTotal = 0

    for edge in graph:
        fromNode, toNode = edge

        # save all outgoing edges from each node. this is undirected, so do 2 ways
        if fromNode not in globalNodes:
            globalNodes[fromNode] = list()
        if toNode not in globalNodes:
            globalNodes[toNode] = list()

        if toNode not in globalNodes[fromNode]:
            globalNodes[fromNode].append(toNode)
        if fromNode not in globalNodes[toNode]:
            globalNodes[toNode].append(fromNode)

        # keep a count of total edges
        edgeTotal += 1

    #print nodes

    # try all node in nodes as starting node in order
    for startingNode in globalNodes:
        outgoingEdges = globalNodes[startingNode]

        path = list()
        path.append(startingNode)
        result = dfs(path, outgoingEdges, list(), edgeTotal)

        if result is not None:
            return result

    return []



inputs = [(0, 1), (1, 5), (1, 7), (4, 5),
          (4, 8), (1, 6), (3, 7), (5, 9),
          (2, 4), (0, 4), (2, 5), (3, 6), (8, 9)]

inputs = [(1, 2), (2, 3), (3, 1), (3, 4)]
inputs = [(2, 6), (4, 2), (5, 4), (6, 5), (6, 8), (7, 9), (8, 7), (9, 6)]

print find_eulerian_tour(inputs)

# tmp [0, 1, 6, 3, 7, 1, 5, 9, 8, 4, 5, 2, 4, 0]
#     [0, 1, 7, 3, 6, 1, 5, 4, 8, 9, 5, 2, 4, 0]


# print edges





