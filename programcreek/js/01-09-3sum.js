function threeSum(list) {
    var result = [];

    if (list.length < 3) return result;

    list.sort();

    for (var i = 0 ; i < list.length - 2; i ++ ) {
        if (i == 0 || list[i] != list[i - 1]) {

            var negate = - list[i];

            var start = i + 1;
            var end = list.length - 1;

            while (start < end) {

                if ( list[start] + list[end] == negate ) {
                    result.push([list[i], list[start], list[end]]);

                    start ++;
                    end --;

                    while (start < end && list[start] == list[start - 1]) start ++;
                    while (start < end && list[end] == list[end + 1]) end --;
                }
                else if (list[start] + list[end] > negate) {
                    end --;
                }
                else {
                    start ++;
                }

            }


        }
    }

    return result;
}


console.log(threeSum([-1, 0, 1, 2, -1, -4, 1]));