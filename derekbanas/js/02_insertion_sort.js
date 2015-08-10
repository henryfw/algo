
function insertionSort( inputs ) {
    for (var i = 1; i < inputs.length; i ++) {
        var toInsertValue = inputs[i];
        var toSwapIndex = i;
        for (var j = i - 1; j >= 0 ; j --) {
            if (inputs[j] > toInsertValue) {
                inputs[j + 1] = inputs[j]
                toSwapIndex = j;
            }
            else {
                break;
            }
        }

        inputs[toSwapIndex] = toInsertValue;
    }
}


function insertionSort2( inputs ) {
    for (var i = 1; i < inputs.length; i ++) {
        var toInsertValue = inputs[i];
        var j = i;
        while( j > 0 && inputs[j - 1] > toInsertValue) {
            inputs[j] = inputs[ j - 1];
            j --;
        }
        inputs[j] = toInsertValue;
    }
}



var inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];

insertionSort(inputs);
console.log(inputs);

inputs.sort(function(a,b) {
    return Math.random() > .5 ? 1 : -1;
});
insertionSort2(inputs)
console.log(inputs);


