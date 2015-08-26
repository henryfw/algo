from ch2_linked_list import LinkedList


def partitionList(l, x):
    if l.first is None or l.first.next is None:
        return

    node = l.first

    while node.next is not None:
        if node.next.val < x:
            oldNextNext = node.next.next
            node.next.next = l.first
            l.first = node.next
            node.next = oldNextNext
        else:
            node = node.next


def test():
    l = LinkedList()
    l.addValue(1)
    l.addValue(2)
    l.addValue(3)
    l.addValue(32)
    l.addValue(30)
    l.addValue(3)
    l.addValue(4)
    l.addValue(5)
    partitionList(l, 8)

    print l.getAll()



if __name__ == '__main__':
    test()