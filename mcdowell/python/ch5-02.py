

def decToBinString(n):

    if n <= 0 or n >= 1.:
        return "ERROR"

    text = "."
    while n > 0:
        if len(text) > 32:
            return "ERROR"
        double = n * 2
        if double >= 1.:
            text += '1'
            n = double - 1
        else:
            text += '0'
            n = double

    return text



print decToBinString(.25)