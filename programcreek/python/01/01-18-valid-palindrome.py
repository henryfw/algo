import re

def isValid(text) :
    text = text.strip().lower()

    if text == '':
        return False

    left = 0
    right = len(text) - 1

    while left < right:
        leftChar = text[left]
        rightChar = text[right]

        if not isGoodChar(leftChar):
            left += 1
        elif not isGoodChar(rightChar):
            right -= 1
        else:
            if leftChar != rightChar:
                return False
            else:
                left += 1
                right -= 1

    return True

def isGoodChar(a):
    return re.search(r'^[a-z0-9]$', a) is not None


print isValid('Red rum, sir, is murder')