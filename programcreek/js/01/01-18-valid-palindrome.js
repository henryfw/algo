

function isValid(text) {
    var text = String(text).trim().toLowerCase();

    if (text == '') return false;

    var left = 0;
    var right = text.length - 1;

    while (left < right) {
        var leftChar = text.charAt(left);
        var rightChar = text.charAt(right);

        if (!isGoodChar(leftChar)) {
            left ++;
        }
        else if (!isGoodChar(rightChar)) {
            right --;
        }
        else {
            if (leftChar != rightChar) {
                return false;
            }
            else {
                left ++;
                right -- ;
            }
        }
    }

    return true;

}

function isGoodChar(a) {
    return /^[a-z0-9]$/.test(a);
}


console.log(isValid('Red rum, sir, is murder')) ;
console.log(isValid('Red rum, sir, is abc')) ;