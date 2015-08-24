import pprint

class Solution:
    # @param A : integer
    # @return a list of list of integers
    def prettyPrint(self, A):
        n = A * 2 - 1
        result = []
        for i in range(n):
            levelAway = abs( i  - (A - 1) )
            row = [levelAway + 1 for i in range(n)]

            for j in range(0, A - levelAway):
                row[j] = A - ( j )
                row[-j -1] = A - ( j )


            result.append(row)
        return result



s = Solution()

pprint.pprint(  s.prettyPrint(6)  )