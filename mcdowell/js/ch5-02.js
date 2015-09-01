

function decToBinString(n) {

    if (n >= 1 || n <= 0) return "ERROR";
    var text = '.';

    while (n > 0) {
        if (text.length > 32) return "ERROR";

        var double = n * 2;
        if (double >= 1) {
            text += '1';
            n = double - 1;
        }
        else {
            text += '0';
            n = double;
        }



    }
    return text
}

console.log(decToBinString(.75))