
class LinkedList:
    first = None

    def addValue(self, val):
        node = LinkedListNode(val)
        if self.first is None:
            self.first = node
        else:
            self.first.addNode(node)
        return node

    def removeValue(self, val):
        if self.first is None:
            return 0
        elif self.first.val == val:
            self.first = None
            return 1
        else:
            return self.first.removeValue(val)

    def getAll(self):
        values = list()
        pointer = self.first
        while pointer is not None:
            values.append(pointer.val)
            pointer = pointer.next
        return values


class LinkedListNode:
    val = None
    next = None
    def __init__(self, val):
        self.val = val

    def addNode(self, node):
        pointer = self
        while pointer.next is not None:
            pointer = pointer.next
        pointer.next = node


    def removeValue(self, val):
        pointer = self
        lastPointer = None
        flag = 0

        while pointer is not None :
            if pointer.val == val:
                lastPointer.next = pointer.next
                flag += 1
            else:
                lastPointer = pointer
            pointer = pointer.next

        return flag

    def __str__(self):
        return str(self.val)


def test():
    l = LinkedList()
    l.addValue(1)
    l.addValue(2)
    l.addValue(3)
    l.addValue(3)
    l.addValue(3)
    l.addValue(4)
    l.addValue(5)

    print l.getAll()

    print l.removeValue(2)
    print l.removeValue(3)
    print l.removeValue(9)

    print l.getAll()



if __name__ == '__main__':
    test()