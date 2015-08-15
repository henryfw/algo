

class Node:
    key = None
    left = None
    right = None

    def __init__(self, key):
        self.key = key

    def __str__(self):
        return str(self.key)

    def remove(self, key, parent):
        if key < self.key:
            if self.left is not None:
                return self.left.remove(key, self)
            else:
                return False
        elif key > self.key:
            if self.right is not None:
                return self.right.remove(key, self)
            else:
                return False
        else:
            if self.left is not None and self.right is not None:
                self.key = self.right.min_value()
                self.right.remove(self.key, self)
            elif parent.left == self:
                if self.left is not None:
                    parent.left = self.left
                else:
                    parent.left = self.right
            elif parent.right == self:
                if self.left is not None:
                    parent.right = self.left
                else:
                    parent.right = self.right
            return True

    def min_value(self):
        if self.left is None:
            return self.key
        else:
            return self.left.min_value()



class Binary_Tree:

    root = None

    def add_node(self, key):
        new_node = Node(key)

        if self.root is None:
            self.root = new_node
        else:
            focus_node = self.root

            while 1:
                parent = focus_node

                if key < focus_node.key:
                    focus_node = focus_node.left

                    if focus_node is None:
                        parent.left = new_node
                        return

                else:
                    focus_node = focus_node.right

                    if focus_node is None:
                        parent.right = new_node
                        return


    def in_order_traverse(self, node):
        if node is not None:
            self.in_order_traverse(node.left)
            print node
            self.in_order_traverse(node.right)


    def post_order_traverse(self, node):
        if node is not None:
            self.post_order_traverse(node.left)
            self.post_order_traverse(node.right)
            print node


    def pre_order_traverse(self, node):
        if node is not None:
            print node
            self.pre_order_traverse(node.left)
            self.pre_order_traverse(node.right)


    def search(self, key):
        node = self.root
        while node.key != key:
            if key < node.key:
                node = node.left
            else:
                node = node.right

            if node is None:
                return None

        return node

    # http://www.algolist.net/Data_structures/Binary_search_tree/Removal
    def remove(self, key):
        if self.root is None:
            return False
        else:
            if self.root.key == key:
                tmp_root_node = Node(None)  # tmp node that will be not used later
                tmp_root_node.left = self.root
                result = self.root.remove(key, tmp_root_node)
                self.root = tmp_root_node.left
                return result
            else:
                return self.root.remove(key, None)



if __name__ == '__main__':
    inputs = [
        1, 23, 4, 434, 232, 324, 11, 2323, 5
    ]
    tree = Binary_Tree()
    for i in inputs:
        tree.add_node(i)

    # tree.pre_order_traverse(tree.root)
    print tree.search(324)

    print tree.remove(324)

    tree.in_order_traverse(tree.root)