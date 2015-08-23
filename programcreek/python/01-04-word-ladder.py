def word_letter(startWord, endWord, words):
    # while tree
    root = Node(startWord, 0, None)
    visited = []
    words.append(endWord)
    counter = {'iterations': 0}

    def build_tree(node):

        if counter['iterations'] > len(words):
            return
        for word in words:
            if word in visited:
                continue
            # if 1 step away
            if checkOneStep(word, node.word):
                visited.append(word)
                node.children.append(Node(word, node.dist + 1, node))
        if len(node.children) > 0:
            for child in node.children:
                build_tree(child)

    # build tree
    build_tree(root)

    # use tree
    openList = [root]
    while len(openList):
        node = openList.pop(0)
        openList += node.children
        for child in node.children:
            if child.word == endWord:
                return child.getPath()

    return None



def checkOneStep(word1, word2):
    if len(word1) != len(word2):
        return False

    diffChars = 0

    for i in range(len(word1)):
        if word1[i] != word2[i]:
            diffChars += 1

        if diffChars >= 2:
            break

    return True if diffChars == 1 else False


class Node():
    dist = 0
    word = ''
    children = []
    parent = None
    def __init__(self, word, dist, parent):
        self.word = word
        self.dist = dist
        self.parent = parent
        self.children = []

    def getPath(self):
        node = self.parent
        ans = [self.word]
        while node is not None:
            ans.append(node.word)
            node = node.parent
        return ans


print word_letter('hit', 'cog', ["hot","dot","dog","lot","log"])