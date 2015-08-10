

class Recorder :

    # list of list
    values = []



    def add(self, value):
        self.values.append(value[:])


    def clear(self):
        self.values = []

    def get_values(self):
        return self.values


    def show(self, padding_width = 6 ):
        format = ("% " + str(padding_width) + "d ")
        for value in self.values :
            print "".join([ format % i for i in value ])
