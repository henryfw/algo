function isMatch(s, p) {

    if (p.length == 0) return s.length == 0;

    if (p.length == 1 ) {
        if (s.length == 0) return false;

        if (s.charAt(0) != p.charAt(0) && p.charAt(0) != '.' ) {
            return false;
        }

        return isMatch(s.substr(1), p.substr(1));
    }

    if (p.charAt(1) != '*') {
        if (s.length == 0) return false;

        if (s.charAt(0) != p.charAt(0) && p.charAt(0) != '.' ) {
            return false;
        }

        return isMatch(s.substr(1), p.substr(1));


    }
    else {
        if (isMatch(s, p.substr(2))) return true;

        var i = 0;

        while (s.charAt(i) == p.charAt(0) || p.charAt(0) == '.') {
            if (isMatch(s.substr(i + 1), p.substr(2))) return true;
            i ++;
        }

        return false;
    }

}


console.log( isMatch("aa","a") )
console.log( isMatch("aa","aa") )
console.log( isMatch("aaa","aa") )
console.log( isMatch("aa", "a*") )
console.log( isMatch("aa", ".*") )
console.log( isMatch("ab", ".*") )
console.log( isMatch("aab", "c*a*b") )