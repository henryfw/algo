


with open('yob1995.txt', 'r') as f:
    name1 = None
    name2 = None
    popularity1 = 0
    popularity2 = 0
    for line in f:
        name, gender, popularity = line.split(",")
        popularity = int(popularity)
        if gender != 'F':
            continue
        if popularity > popularity1:
            popularity2 = popularity1
            name2 = name1
            popularity1 = popularity
            name1 = name
        elif popularity > popularity2:
            popularity2 = popularity
            name2 = name

    print name2


