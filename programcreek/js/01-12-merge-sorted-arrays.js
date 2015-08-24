function mergeArrays(A, B) {


    var m = A.length;
    var n = B.length;


    B.forEach(function() {A.push(0)});

    while (m > 0 && n > 0) {
        if (A[m - 1] > B[n - 1]) {
            A[m + n - 1] = A[m - 1];
            m --;
        }
        else {
            A[m + n - 1] = B[n - 1];
            n --;
        }
    }

    while (n > 0) {
        A[m + n - 1] = B[n - 1];
        n --;
    }

    return  A;
}



console.log( mergeArrays([2,3,4], [4,5,6,7,8] )  );