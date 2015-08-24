class Solution:
    # @param A : tuple of integers
    # @return a list of integers
    def repeatedNumber(self, A):

        table = [0 for i in range(len(A) + 1)]
        # sort using counting sort
        for i in A:
            table[i] += 1

        a, b = 0, 0
        for i in range(1, len(A) + 1) :
            if table[i] == 0:
                b = i
            if table[i] == 2:
                a = i
        return [a,b]