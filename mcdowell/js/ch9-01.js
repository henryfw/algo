

function countWays(n, map) {
    if (n < 0) return 0;
    else if (n == 0) return 1;
    else {
        if (typeof map[n] != 'undefined') return map[n];
        else {
            var ans = countWays(n - 1, map) + countWays(n - 2, map) + countWays(n - 3, map);
            map[n] = ans;
            return ans;
        }
    }
}


console.log(countWays(100, {}));