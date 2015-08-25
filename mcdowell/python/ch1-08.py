def isRotation(s1, s2):

    if not s1 or not s2 or len(s1) != len(s2):
        return False

    return (s1+s1).find(s2) != -1



print isRotation('abcd', 'cdab')
print isRotation('abcd', 'aaaa')
print isRotation('abcasdfsdfd', 'cdab')
