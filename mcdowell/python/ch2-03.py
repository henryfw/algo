from ch2_linked_list import LinkedList


def deleteNode(node):
    if node is None or node.next is None:
        return False

    nextNode = node.next
    node.val = nextNode.val
    node.next = nextNode.next

    return True


def test():
    l = LinkedList()
    l.addValue(1)
    l.addValue(2)
    l.addValue(3)
    node = l.addValue(32)
    l.addValue(30)
    l.addValue(3)
    l.addValue(4)
    l.addValue(5)
    node = deleteNode(node)

    print l.getAll()



if __name__ == '__main__':
    test()