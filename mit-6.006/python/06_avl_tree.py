# http://www.geeksforgeeks.org/avl-tree-set-1-insertion/

class Node:
    val = None
    left = None
    right = None
    parent = None
    height = 0

    def add(self, node):
        if node.val <= self.val:
            if self.left is None:
                self.left = node
                node.parent = self
            else:
                self.left.add(node)

        else:
            if self.right is None:
                self.right = node
                node.parent = node
            else:
                self.right.add(node)

        leftHeight = self.left.height if self.left else 0
        rightHeight = self.right.height if self.right else 0
        self.height = max([leftHeight, rightHeight]) + 1

        balance = leftHeight - rightHeight
        if balance > 1 and node.val < self.left.val:
            self.rotateRight()


    def rotateRight(self):
        pass


    def rotateLeft(self):
        pass


    def remove(self):
        pass


class Tree:
    root = None

    def add(self, val):
        node = Node()
        node.val = val
        node.height = 1

        if self.root is None:
            self.root = node
        else:
            self.root.add(node)


    def search(self, val):
        node = self.root

        while node is not None:
            if node.val == val:
                return node

            if val <= node.val:
                node = node.left
            else:
                node = node.right

        return None

    def remove(self, val):
        node = self.search(val)
        if node is None:
            return False

        if node == self.root:
            self.root = None

        node.remove()
        return True


tree = Tree()
tree.add(30)
tree.add(51)
tree.add(21)
tree.add(25)
tree.add(3)
tree.add(10)
tree.add(31)
tree.add(99)
tree.add(6)
tree.add(29)

print tree.root.val
print tree.search(21).height