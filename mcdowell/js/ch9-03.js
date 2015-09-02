function magicFast(inputs, start, stop) {

    if (start > stop) return -1;

    var mid = parseInt((start + stop) / 2);
    var midValue = inputs[mid];

    if (mid == midValue) return mid;

    var left = magicFast(inputs, start, Math.min(midValue, mid - 1));
    if (left != -1) return left;

    var right = magicFast(inputs, Math.max(midValue, mid + 1), stop);

    return right;


}




var inputs = [-10, -10, 0, 3, 3, 3, 3, 10, 11, 12];
console.log( magicFast(inputs, 0, inputs.length - 1)  );