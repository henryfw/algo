function isPrime(n) {
    if (n === 1 || n === 2 || n % 2 == 2) return false;

    for (var i = 3, j = parseInt(Math.sqrt(n)); i <= j; i ++ ) {
        if (n % i == 0) {
            return false;
        }
    }
    return true;
}


console.log(isPrime(11))
console.log(isPrime(81))