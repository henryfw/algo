
// returns sorted, not in place
function mergeSort(inputs) {
    if (inputs.length <= 1) return inputs;

    var left = [];
    var right = [];

    var mid = parseInt(inputs.length/2);

    left = inputs.slice(0, mid);
    right = inputs.slice(mid);

    left = mergeSort(left);
    right = mergeSort(right);

    return merge(left, right);

}


function merge(left, right) {
    var result = [];
    while ( left.length && right.length ) {

        if (left[0] <= right[0]) {
            result.push(left.shift());
        }
        else {
            result.push(right.shift());
        }
    }

    result = result.concat(left);
    result = result.concat(right);

    return result;
}


var inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];

var result = mergeSort(inputs);
console.log(result);