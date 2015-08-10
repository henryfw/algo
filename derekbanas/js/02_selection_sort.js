function swap(inputs, i, j) {
    var tmp = inputs[i];
    inputs[i] = inputs[j];
    inputs[j] = tmp;
}


function selectionSort( inputs ) {
    for (var i = 0; i < inputs.length; i ++) {
        var smallest = i;
        for ( var j = i; j < inputs.length; j ++) {
            if (inputs[j] < inputs[smallest]) {
                smallest = j
            }
        }
        swap(inputs, smallest, i);
    }
}




var inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];

selectionSort(inputs);

console.log(inputs);


