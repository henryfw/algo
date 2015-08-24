# Definition for a  binary tree node
# class TreeLinkNode:
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None
#         self.next = None

class Solution:
    # @param root, a tree node
    # @return nothing
    def connect(self, root):
        table = []
        openList = [root]
        while len(openList):
            node = openList.pop(0)
            table.append(node)
            if node.left is not None:
                table.append(node.left)
                table.append(node.right)

        for i in range(len(table)):
            table[i].next = getNext(i, table)


def getNext(i, table):
    if i == len(table) - 1:
        return None

    return table[i + 1].val


def isLeft(i):
    return i % 2 == 1

def getLeft(i):
    return i * 2 + 1

def getRight(i):
    return i * 2 + 2

def getParent(i):
    return (i - 1) // 2