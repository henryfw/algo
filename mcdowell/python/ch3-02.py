import sys


class StackWithMin:
    data = []

    def push(self, val):
        lowest = None
        l = len(self.data)
        if l > 0:
            lowest = self.data[-1]['lowest']
        if lowest is None or val < lowest:
            lowest = val
        self.data.append({
            'lowest' : lowest,
            'val' : val
        })

    def pop(self):
        return self.data.pop()



stack = StackWithMin()

stack.push(5)
stack.push(3)
stack.push(6)
stack.push(7)
stack.push(8)
stack.push(1)
stack.push(11)
stack.push(12)


print stack.pop()
print stack.pop()
print stack.pop()
print stack.pop()
print stack.pop()
print stack.pop()
print stack.pop()
print stack.pop()