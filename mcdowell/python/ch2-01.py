from ch2_linked_list import LinkedList


def removeDuplicates(l):

    if l.first is None:
        return 0


    table = dict()
    pointer = l.first.next
    parent = l.first
    flag = 0
    while pointer is not None:
        if pointer.val in table:
            parent.next = pointer.next
            flag += 1
        else:
            table[pointer.val] = 1
            parent = pointer
        pointer = pointer.next
    return flag

def removeDuplicatesWithoutNextMemory(l):

    if l.first is None:
        return 0
    flag = 0
    current = l.first

    while current is not None:
        runner = current.next
        while runner is not None:
            if runner.val == current.val:
                current.next = current.next.next
                flag += 1
            runner = runner.next
        current = current.next

    return flag

def test():
    l = LinkedList()
    l.addValue(1)
    l.addValue(2)
    l.addValue(3)
    l.addValue(3)
    l.addValue(3)
    l.addValue(4)
    l.addValue(5)
    removeDuplicatesWithoutNextMemory(l)
    print l.getAll()



if __name__ == '__main__':
    test()