# http://www.algolist.net/Algorithms/Number_theoretic/Primality_test_naive


from math import sqrt

def isprime(n):
    if n == 1 or n == 2 or n % 2 == 0:
        return False
    for i in range( 3, int(sqrt(n)) + 1, 1):
        if n % i == 0:
            return False

    return True




print isprime(11)
print isprime(1000)