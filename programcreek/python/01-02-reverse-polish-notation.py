

def rpn(inputs):
    stack = []
    operators = ['+', '-', '*', '/']
    for i in inputs:
        if i not in operators:
            stack.insert(0, i)
        else:
            var1 = int(stack.pop(0))
            var2 = int(stack.pop(0))

            if i == '+':
                ans = var2 + var1
            elif i == '-':
                ans = var2 + var1
            elif i == '*':
                ans = var2 * var1
            elif i == '/':
                ans = var2 / var1

            stack.insert(0, ans)

    return stack[0]


print rpn(["2", "1", "+", "3", "*"])
print rpn(["4", "13", "5", "/", "+"])



