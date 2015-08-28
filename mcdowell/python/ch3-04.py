import pprint


class AllTowers:
    data = []
    def getTower(self, i):
        return self.data[i]
    def append(self, tower):
        self.data.append(tower)

    def __str__(self):
        maxHeight = max([ len(tower.disks) for tower in self.data ])
        text = ""
        disks = []
        for i in range(len(self.data)):
            disks.append(self.data[i].disks + [' ' for _ in range(maxHeight - len(self.data[i].disks))])
        for j in range(maxHeight - 1, -1, -1):
            text += "%s %s %s\n" % (str(disks[0][j]), str(disks[1][j]), str(disks[2][j]))
        return text

    def __getitem__(self, item):
        return self.getTower(item)


allTowers = AllTowers()


class Tower:
    disks = None
    index = 0

    def __init__(self, i):
        self.disks = []
        self.index = i

    def add(self, d):
        if len(self.disks) > 0 and self.disks[-1] <= d:
            raise ValueError("Cannot place disk here")
        self.disks.append(d)

    def moveTopTo(self, otherTower):
        top = self.disks.pop()
        otherTower.add(top)
        print "Move disk %d from %d to %d" % (top, self.index, otherTower.index)
        print(allTowers)

    def moveDisks(self, n, destinationTower, bufferTower):
        if n > 0:
            self.moveDisks(n - 1, bufferTower, destinationTower)
            self.moveTopTo(destinationTower)
            bufferTower.moveDisks(n - 1, destinationTower, self)

    def __str__(self):
        text = ""
        return " ".join([str(i) for i in self.disks])



for i in range(3):
    allTowers.append(Tower(i))

n = 4
for i in range(n - 1, -1, -1):
    allTowers.getTower(0).add(i)

print(allTowers)
allTowers[0].moveDisks(n, allTowers[2], allTowers[1])


