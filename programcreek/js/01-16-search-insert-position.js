
function searchInsertPosition(A, target) {
    if (!A.length || target < A[0]) return 0;

    var left = 0;
    var right = A.length - 1;

    while (left < right) {
        var mid = Math.floor((left + right) / 2);

        if (A[mid] == target) return mid;
        else if (target < A[mid]) right = mid - 1;
        else left = mid + 1;

    }

    return left + 1;
}



console.log( searchInsertPosition([1,3,5,6], 5) );
console.log( searchInsertPosition([1,3,5,6], 2) );
console.log( searchInsertPosition([1,3,5,6], 7) );
console.log( searchInsertPosition([1,3,5,6], 0) );





