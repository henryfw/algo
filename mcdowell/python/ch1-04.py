# note, python strings are immutage

def replaceSpaces(text):

    originalLength = len(text)

    newText = ""

    for i in range(originalLength):
        if text[i] == ' ':
            newText += '0'
            newText += '2'
            newText += '%'
        else:
            newText += text[i]


    return newText





print replaceSpaces(' a ')
print replaceSpaces('abc def ')
print replaceSpaces('abcdef')
