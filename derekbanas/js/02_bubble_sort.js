function swap(inputs, i, j) {
    var tmp = inputs[i];
    inputs[i] = inputs[j];
    inputs[j] = tmp;
}


function bubbleSort( inputs ) {
    for ( var i = inputs.length - 1; i >= 0; i --) {
        for ( var j = 0; j < i; j ++) {
            if (inputs[j] > inputs[j + 1]) {
                swap(inputs, j, j + 1);
            }
        }
    }
}




var inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];

bubbleSort(inputs);

console.log(inputs);


