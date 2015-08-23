function isIsomorphic(val1, val2) {
    if (!val1 || !val2 || typeof val1 != 'string' || typeof val2 != 'string'
            || val1.length != val2.length) {
        return 0;
    }

    var charMap = {};

    for (var i = 0, ii = val1.length; i < ii; i ++){
        var char1 = val1.charAt(i);
        var char2 = val2.charAt(i);

        if (typeof charMap[char1] == 'undefined') {
            charMap[char1] = char2;
        }
        else {
            if (charMap[char1] != char2) {
                return 0;
            }
        }
    }

    return 1;
}


console.log(isIsomorphic('add', 'egg'));
console.log(isIsomorphic('foo', 'bar'));