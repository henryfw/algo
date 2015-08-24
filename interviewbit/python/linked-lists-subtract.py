# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, x):
#         self.val = x
#         self.next = None

class Solution:
    # @param A : head node of linked list
    # @return the head node in the linked list
    def subtract(self, A):
        map = list()
        node = A
        map.append(node.val)
        while A.next:
            node = A.next
            map.append(node.val)
        node = A
        for i in range(1, len(map) // 2 + 1):
            node.val -= map[-i]
            node = node.next

        return A


s = Solution()
