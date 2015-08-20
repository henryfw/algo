#
# Write a function, `bipartite` that
# takes as input a graph, `G` and tries
# to divide G into two sets where 
# there are no edges between elements of the
# the same set - only between elements in
# different sets.
# If two sets exists, return one of them
# or `None` otherwise
# Assume G is connected
#

def bipartite(G):

    # run a dfs on every other node
    open_list = []
    in_group = []
    other_group = []

    for i in G:
        open_list.append(i)
        break

    while len(open_list) > 0:
        node = open_list.pop(0)

        if node in other_group:
            return None

        if node not in in_group:
            in_group.append(node)

            for neighbor in G[node]:
                if neighbor in other_group:
                    continue
                other_group.append(neighbor)

                for neighbor_of_neighbor in G[neighbor]:
                    open_list.append(neighbor_of_neighbor)




    return in_group


########
#
# Test

def make_link(G, node1, node2, weight=1):
    if node1 not in G:
        G[node1] = {}
    (G[node1])[node2] = weight
    if node2 not in G:
        G[node2] = {}
    (G[node2])[node1] = weight
    return G


def test():
    edges = [(1, 2), (2, 3), (1, 4), (2, 5),
             (3, 8), (5, 6)]
    G = {}
    for n1, n2 in edges:
        make_link(G, n1, n2)
    g1 = bipartite(G)
    print g1
    assert (g1 == set([1, 3, 5]) or
            g1 == set([2, 4, 6, 8]))
    edges = [(1, 2), (1, 3), (2, 3)]
    G = {}
    for n1, n2 in edges:
        make_link(G, n1, n2)
    g1 = bipartite(G)
    assert g1 == None


