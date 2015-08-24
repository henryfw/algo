class Solution:
    # @param A : list of integers
    # @return a list of integers
    def plusOne(self, A):
        A = A[:]
        length = len(A)
        A[length - 1] += 1

        i = length - 1
        while i >= 0:
            if A[i] == 10:
                if i == 0:
                    A[i] = 0
                    A.insert(0, 1)
                else :
                    A[i] = 0
                    A[i - 1] += 1
            i -= 1
        while A[0] == 0:
            A.pop(0)
        return A



s = Solution()
print s.plusOne([9,9,9,9])