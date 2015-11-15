def is_isomorphic(val1, val2) :
    # map each char from val1 to val2 and then see as they play back if they are the same order
    char_map = dict()

    if len(val1) != len(val2) or len(val1) == 0:
        return False

    for i in range(len(val1)):

        char1 = val1[i]
        char2 = val2[i]

        if char1 not in char_map:
            char_map[char1] = char2
        else:
            mapped_char = char_map[char1]
            if char2 != mapped_char:
                return False

    return True


print is_isomorphic('egg', 'add')
print is_isomorphic('foo', 'bar')