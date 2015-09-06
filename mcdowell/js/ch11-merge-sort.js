function mergeSort(inputs) {
    if (inputs.length <= 1) return inputs;
    var mid = parseInt(inputs.length / 2);
    var left = mergeSort(inputs.slice(0, mid));
    var right = mergeSort(inputs.slice(mid));
    return merge(left, right);
}


function merge(left, right){
    var ans = [];

    var leftIndex = 0, rightIndex = 0;

    while (leftIndex < left.length && rightIndex < right.length) {
        if (left[leftIndex] <= right[rightIndex]) {
            ans.push(left[leftIndex]);
            leftIndex ++;
        }
        else {
            ans.push(right[rightIndex]);
            rightIndex ++;
        }
    }
    while (leftIndex < left.length) {
        ans.push(left[leftIndex]);
        leftIndex ++;
    }
    while (rightIndex < right.length) {
        ans.push(right[rightIndex]);
        rightIndex ++;
    }

    return ans;
}




console.log(mergeSort([23,4,556,32,1,2,3,4,5,3]))