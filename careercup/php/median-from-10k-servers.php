<?php

// http://www.careercup.com/question?id=5175812277927936

// 1) Each server write to disk: number -> count. Combine all files. Find median.

// 2) Use index-based array with index as bucket and value as count. need 32GB RAM with 4 btye int.
// This can also be done distributed.


/*
 * https://www.quora.com/Distributed-Algorithms/What-is-the-distributed-algorithm-to-determine-the-median-of-arrays-of-integers-located-on-different-computers
 *
 * Suppose you have a master node (or are able to use a consensus protocol to elect a master from among your servers).  The master first queries the servers for the size of their sets of data, call this n, so that it knows to look for the k = n/2 largest element.

The master then selects a random server and queries it for a random element from the elements on that server.  The master broadcasts this element to each server, and each server partitions its elements into those larger than or equal to the broadcasted element and those smaller than the broadcasted element.

Each server returns to the master the size of the larger-than partition, call this m.  If the sum of these sizes is greater than k, the master indicates to each server to disregard the less-than set for the remainder of the algorithm.  If it is less than k, then the master indicates to disregard the larger-than sets and updates k = k - m.  If it is exactly k, the algorithm terminates and the value returned is the pivot selected at the beginning of the iteration.

If the algorithm does not terminate, recurse beginning with selecting a new random pivot from the remaining elements.
 */