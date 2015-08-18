import csv

def make_weighted_link(G, node1, node2):
    if node1 not in G:
        G[node1] = {}
    if node2 not in G[node1]:
        G[node1][node2] = 0
    G[node1][node2] += 1

    weight = G[node1][node2]

    return weight



def main():

    reader = csv.reader(open('marvel.tsv'), delimiter='\t', quotechar='"')

    characters = {}
    books = {}
    G = {} # character to character graph

    for line in reader:
        character, book = line
        if book not in books:
            books[book] = {}
        books[book][character] = 1

        if character not in characters:
            characters[character] = {}
        characters[character][book] = 1


    maxWeight = 0
    maxPair = None
    for character in characters:
        for book in characters[character]:
            for characterInBook in books[book]:
                if character != characterInBook:
                    weight = make_weighted_link(G, character, characterInBook)
                    if weight > maxWeight:
                        if maxPair != (character, characterInBook):
                            print "new max %d %s %s" % (weight, character, characterInBook)
                        maxPair = (character, characterInBook)
                        maxWeight = weight



    print "\n\nThe answer is: "
    print maxPair, maxWeight



main()