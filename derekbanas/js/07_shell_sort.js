


function shellSort(inputs) {

    var increment = parseInt( inputs.length / 2);

    while (increment > 0 ) {
        for ( var i = increment; i < inputs.length; i ++ ) {
            var toInsertIndex = i;
            var tmp = inputs[i];

            for ( var j = i; j >= i - increment; j -= increment ) {
                if ( inputs[j - increment] > tmp ) {
                    inputs[j] = inputs[j - increment];
                    toInsertIndex = j - increment;
                }
                else {
                    break;
                }
            }
            inputs[toInsertIndex] = tmp;

        }
        increment =
            increment == 2 ?
            1 :
            parseInt( increment * 5/11 );
    }


}

var inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];

shellSort(inputs);

console.log(inputs);


