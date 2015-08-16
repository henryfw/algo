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
nodes = dict() # key is node id, value is list of connected nodes


def getEdgeId(x, y):
    return "%d-%d" % ((x, y) if x < y else (y, x))

# try dfs
def dfs(path, outgoingNodes, usedEdges, edgeTotal):

    # ending condition in last cycle
    if len(usedEdges) == edgeTotal - 1:
        startingNode = path[0]
        if startingNode in outgoingNodes:
            edgeId = getEdgeId(startingNode, path[-1])
            if edgeId not in usedEdges:
                # found it
                path.append(startingNode)
                usedEdges.append(edgeId)
                return path
        return None

    else:
        for node in outgoingNodes:
            edgeId = getEdgeId(node, path[-1])
            if edgeId not in usedEdges:
                usedEdges.append(edgeId)
                path.append(node)
                # print path
                result = dfs(path, nodes[node], usedEdges, edgeTotal)
                if result is not None:
                    return result
        return None



def find_eulerian_tour(graph):

    edgeTotal = 0

    for edge in graph:
        fromNode, toNode = edge

        # save all outgoing edges from each node. this is undirected, so do 2 ways
        if fromNode not in nodes:
            nodes[fromNode] = list()
        if toNode not in nodes:
            nodes[toNode] = list()

        if toNode not in nodes[fromNode]:
            nodes[fromNode].append(toNode)
        if fromNode not in nodes[toNode]:
            nodes[toNode].append(fromNode)

        # keep a count of total edges
        edgeTotal += 1



    # try all node in nodes as starting node in order
    for startingNode in nodes:
        outgoingEdges = nodes[startingNode]

        path = list()
        path.append(startingNode)
        result = dfs(path, outgoingEdges, list(), edgeTotal)

        if result is not None:
            return result

    return []



inputs = [(0, 1), (1, 5), (1, 7), (4, 5),
          (4, 8), (1, 6), (3, 7), (5, 9),
          (2, 4), (0, 4), (2, 5), (3, 6), (8, 9)]

inputs = [(1, 2), (2, 3), (3, 1), (3, 4), (4, 3)]

print find_eulerian_tour(inputs)
# print edges
