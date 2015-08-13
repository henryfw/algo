

function quickSort(inputs) {
    quickSortBody(inputs, 0, inputs.length - 1);
}


function quickSortBody(inputs, left, right) {
    var start = left;
    var end = right;

    if (left < right) {
        var pivot = inputs[right];
        while(left <= right) {
            while(inputs[left] < pivot) {
                left ++;
            }
            while(inputs[right] > pivot) {
                right --;
            }
            if (left <= right) {
                var tmp = inputs[right];
                inputs[right] = inputs[left];
                inputs[left] = tmp;
                left ++;
                right --;
            }
        }
        quickSortBody(inputs, start, right);
        quickSortBody(inputs, left, end);
    }
}


var inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];

quickSort(inputs);

console.log(inputs);

