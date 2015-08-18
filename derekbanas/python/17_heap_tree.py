# http://www.algolist.net/Data_structures/Binary_heap


class Min_Heap:
    data = None
    size = 0
    max_size = 0

    def __init__(self, max_size=100):
        self.data = [ -1 for i in range(max_size) ]
        self.max_size = 100

    def get_min(self):
        if self.size == 0:
            return None
        return self.data[0]

    def get_left_index(self, node_index):
        return 2 * node_index + 1

    def get_right_index(self, node_index):
        return 2 * node_index + 2

    def get_parent_index(self, node_index):
        return (node_index - 1) // 2

    # add to last spot and work it up the tree
    def add(self, value):
        if self.size == self.max_size :
            raise "max size reached"
        self.size += 1
        self.data[self.size - 1] = value
        self.sift_up(self.size - 1)

    def sift_up(self, node_index):
        parentIndex = None
        if node_index != 0:
            parentIndex = self.get_parent_index(node_index)
            if self.data[parentIndex] > self.data[node_index]:
                tmp = self.data[parentIndex]
                self.data[parentIndex] = self.data[node_index]
                self.data[node_index] = tmp
                self.sift_up(parentIndex)



    # remove the first spot and move the last one there. then work the first spot down the tree.
    def remove_min(self):
        if self.size == 0:
            return None
        result = self.data[0]
        self.data[0] = self.data[self.size - 1]
        self.size -= 1
        self.sift_down(0)
        return result

    def sift_down(self, node_index):
        left_index = self.get_left_index(node_index)
        right_index = self.get_right_index(node_index)
        index_to_use = -1


        if left_index < self.size and self.data[left_index] < self.data[node_index]:
            if right_index < self.size:
                index_to_use = left_index if self.data[left_index] <= self.data[right_index] else right_index
            else:
                index_to_use = left_index
        elif right_index < self.size and self.data[right_index] < self.data[node_index]:
            index_to_use = right_index

        if index_to_use != -1:
            tmp = self.data[node_index]
            self.data[node_index] = self.data[index_to_use]
            self.data[index_to_use] = tmp
            self.sift_down(index_to_use)

    def sort(self):
        result = []
        tmp = Min_Heap(self.max_size)
        tmp.data = self.data
        tmp.size = self.size
        while tmp.size > 0:
            result.append(tmp.remove_min())
        return result

    def __str__(self):
        value = ""
        for i in range(0, self.size):
            value += str(self.data[i]) + " ";
        return value


if __name__ == '__main__':
    inputs = [
        1, 23, 4, 434, 232, 324, 11, 2323, 5
    ]


tree = Min_Heap(100)
for i in inputs:
    tree.add(i)
print tree

print tree.sort()

print tree.remove_min()

print tree
