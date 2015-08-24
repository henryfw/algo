class Solution:
    # @param A : list of integers
    # @return an integer
    def countInversions(self, A):

        # to it backwards keeping an b-tree of past values
        ans = 0
        tree = Tree()
        for i in range(len(A)):
            # get counter of values > A[i]
            value = tree.getCountGreaterThan(A[i])
            # print "i: %d, value: %d, found: %d" %(i, A[i], value)
            # if i == 3:
            #
            #     break;

            ans += value

            tree.add(A[i])
        return ans


class Node:
    value = None
    left = None
    right = None
    parent = None
    children = 0

    def add(self, node):
        if node.value <= self.value:
            if self.left is None:
                self.left = node
                node.parent = self
                self.updateChildren(1)
            else:
                self.left.add(node)
        else :
            if self.right is None:
                self.right = node
                node.parent = self
                self.updateChildren(1)
            else:
                self.right.add(node)

    def updateChildren(self, n):
        self.children += n
        if self.parent is not None:
            self.parent.updateChildren(n)


class Tree:
    root = None
    def add(self, value):
        node = Node()
        node.value = value

        if self.root is None:
            self.root = node
        else:
            self.root.add(node)

    def getCountGreaterThan(self, test):
        count = 0
        node = self.root
        # find the first node > test
        while True:
            if node is None:
                return count

            if node.value > test:
                count += 1
                if node.right is not None:
                    count += node.right.children

                node = node.left
            else:
                node = node.right
        return count


s = Solution()

print s.countInversions(
     [ 84, 2, 37, 3, 67, 82, 19, 97, 91, 63, 27, 6, 13, 90, 63, 89, 100, 60, 47, 96, 54, 26, 64, 50, 71, 16, 6, 40, 84, 93, 67, 85, 16, 22, 60 ]

)