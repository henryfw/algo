from ch2_linked_list import LinkedList


def findKthFromEndNode(l, k):

    if l.first is None or k == 0:
        return None

    p1 = l.first
    p2 = l.first

    # move p2 forward k-1 steps
    for i in range(0, k - 1):
        if p2 is None:
            return None
        p2 = p2.next
    if p2 is None:
        return None

    # move both until p2 hits end
    while p2.next is not None:
        p2 = p2.next
        p1 = p1.next

    return p1




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
    node = findKthFromEndNode(l, 5)
    print node.val if node is not None else None



if __name__ == '__main__':
    test()