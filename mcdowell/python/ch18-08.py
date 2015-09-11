

class PrefixTree:
    root = None

    def __init__(self, string):
        self.root = PrefixTreeNode()
        for i in range(len(string)):
            self.root.insertString(string[i:], i)


    def search(self, string):
        return self.root.search(string)


class PrefixTreeNode:
    children = None
    indexes = None

    def __init__(self):
        self.children = {}
        self.indexes = []


    def insertString(self, string, index):
        if string is not None and len(string) > 0:
            firstLetter = string[0]
            child = None

            if firstLetter in self.children:
                child = self.children[firstLetter]
            else:
                child = PrefixTreeNode()
                self.children[firstLetter] = child

            child.indexes.append(index)
            child.insertString(string[1:], index)



    def search(self, string):
        if string is None or len(string) == 0:
            return self.indexes

        firstLetter = string[0]
        if firstLetter in self.children:
            return self.children[firstLetter].search(string[1:])

        return -1

    def preOrderTranverse(self, depth = 0):

        padStr = ""
        for i in range(depth):
            padStr += "-"

        for k in self.children:
            print padStr + k
            self.children[k].preOrderTranverse(depth + 2)



tree = PrefixTree("bibs")

tree.root.preOrderTranverse()


print tree.search("s")