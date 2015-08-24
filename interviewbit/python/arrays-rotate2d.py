class Solution:
    # @param A : list of list of integers
    # @return the same list modified
    def rotate(self, A):
        #B = [ [0 for i in range(len(A))] for j in range(len(A[0])) ]
        for i in range(len(A)):
            for j in range(len(A[0])):
                tmp = A[j][len(A)-1-i]
                A[j][len(A)-1-i] = A[i][j]
                A[i][j] = tmp
        return A


s = Solution()
print s.rotate([[1,2],[3,4]])
'''
Example:

If the array is

[
    [1, 2],
    [3, 4]
]
0,0 0,1
1,0 1,1

Then the rotated array becomes:
1,0 0,0
1,1 0,1

[
    [3, 1],
    [4, 2]
]

0,0 => 0,1
0,1 => 1,1
1,0 => 0,0
1,1 => 1,0
'''