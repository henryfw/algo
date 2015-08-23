def isMatch(s, p):

    if len(p) == 0:
        return len(s) == 0

    if len(p) == 1:
        if len(s) == 0:
            return False

        if p[0] != s[0] and p[0] != '.':
            return False

        return isMatch(s[1:], p[1:])

    if p[1] != '*':
        if len(s) == 0:
            return False

        if s[0] != p[0] and p[0] != '.':
            return False

        return isMatch(s[1:], p[1:])

    else:

        if isMatch(s, p[2:]):
            return True

        i = 0
        while i < len(s) and (s[i] == p[0] or p[0] == '.'):

            if isMatch(s[i + 1:], p[2:]):
                return True
            i += 1

        return False


print isMatch("aa","a")
print isMatch("aa","aa")
print isMatch("aaa","aa")
print isMatch("aa", "a*")
print isMatch("aa", ".*")
print isMatch("ab", ".*")
print isMatch("aab", "c*a*b")