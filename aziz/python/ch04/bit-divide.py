

def divide(x, y):
    result = 0

    power = 32

    yPower = y << power

    while x >= y:
        while yPower > x:
            yPower >>= 1
            power -= 1

        print "result %d, power %d, yPower %d" % (result, power, yPower)
        result += 1 << power
        x -= yPower


    return result



print divide(125, 5)