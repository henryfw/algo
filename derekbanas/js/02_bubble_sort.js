function swap(input, i, j) {
    var tmp = input[i];
    input[i] = input[j];
    input[j] = tmp;
}


function bubbleSort( input ) {
    for ( var i = input.length - 1; i >= 0; i --) {
        for ( var j = 0; j < i; j ++) {
            if (input[j] > input[j + 1]) {
                swap(input, j, j + 1);
            }
        }
    }
}




var input = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];

bubbleSort(input);

console.log(input);


