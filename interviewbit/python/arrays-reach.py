


class Solution:
    # @param X : list of integers
    # @param Y : list of integers
    # Points are represented by (X[i], Y[i])
    # @return an integer
    def coverPoints(self, X, Y):
        ans = 0
        x = X[0]
        y = Y[0] # current position
        for step in range(1, len(X)):
            nextX = X[step]
            nextY = Y[step]

            xDist = abs(x - nextX)
            yDist = abs(y - nextY)
            #print xDist, yDist
            ans += (xDist if xDist > yDist else yDist)
            x, y = nextX, nextY
        return ans


s = Solution()
print s.coverPoints( [ 4, 8, -7, -5, -13, 9, -7, 8 ], [ 4, -15, -10, -3, -13, 12, 8, -8 ] )