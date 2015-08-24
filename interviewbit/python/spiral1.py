class Solution:
    # @param A : tuple of list of integers
    # @return a list of integers
    def spiralOrder(self, A):
        result = [A[0][0]]
        height = len(A)
        width = len(A[0])
        wall = {"left": -1, "right": width, "top" : -1, "bottom": height  }

        def getNewCoord(x, y, d, wall):
            newD = d
            if d == "right" and x + 1 >= wall["right"]:
                newD = "down"
                wall["top"] += 1
            elif d == "down" and y + 1 >= wall["bottom"]:
                newD = "left"
                wall["right"] -= 1
            elif d == "left" and x - 1 <= wall["left"]:
                newD = "up"
                wall["bottom"] -= 1
            elif d == "up" and y - 1 <= wall["top"]:
                newD = "right"
                wall["left"] += 1

            newX = x
            if newD == "right":
                newX += 1
            elif newD == "left":
                newX -= 1
            newY = y
            if newD == "up":
                newY -= 1
            elif newD == "down":
                newY += 1

            return ( newX, newY, newD, wall )

        ## Actual code to populate result
        d = "right"
        x = 0
        y = 0
        iteration = 1
        while True:
            if iteration >= width * height:
                break

            ans = getNewCoord(x, y, d, wall)

            if ans is None:
                break

            x, y, d, wall = ans
            result.append(A[y][x])
            iteration += 1
        return result


s = Solution()

print s.spiralOrder([
  [1],
])

print s.spiralOrder([
  [1, 2],
  [3, 4],
  [5, 6],
])