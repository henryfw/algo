function quickSort(inputs, left, right) {
    if (typeof left == 'undefined') left = 0;
    if (typeof right == 'undefined') right = inputs.length - 1;

    if (left >= right) return;

    var start = left;
    var stop = right;
    var pivot = inputs[right];

    while (left <= right) {
        while(inputs[left] < pivot) left++;
        while(inputs[right] < pivot) right --;

        if (left <= right) {
            var tmp = inputs[right];
            inputs[right] = inputs[left];
            inputs[left] = tmp;
            left ++;
            right --;
        }
    }

    quickSort(inputs, start, right);
    quickSort(inputs, left, stop);
}

var inputs = [1, 2,3 ,45,67,88,12,5];
quickSort(inputs);
console.log(inputs);