import sys

class Solution:
    # @param A : tuple of integers
    # @return an integer
    def maxSubArray(self, A):
        sum = A[0]
        for i in range(0, len(A)):
            lastValue = A[i]
            if lastValue > sum:
                sum = lastValue
            for j in range( i + 1 , len(A) ):
                lastValue += A[j]
                if lastValue > sum:
                    sum = lastValue
        return sum

    def maxSubArrayTrick(self, A):
        tmp = 0
        ans = -sys.maxint - 1
        for i in A:
            ans = max([i, ans])
            if tmp + i > 0:
                tmp += i

                ans = max([tmp, ans])
            else:
                tmp = 0
        return ans



s = Solution()

inputs=[ -2, 1, -3, 4, -1, 2, 1, -5, 4 ]
print s.maxSubArrayTrick( inputs )