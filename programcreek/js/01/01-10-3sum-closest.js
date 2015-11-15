

function threeSumClosest(nums, target) {

    nums.sort();
    var result = 0;
    var bestAns = Number.MAX_VALUE;

    for ( var i = 0 ; i < nums.length; i ++ ) {
        var j = i + 1;
        var k = nums.length - 1;

        while (j < k) {

            var total = nums[i] + nums[j] + nums[k];
            var diff = Math.abs(total - target);

            if (diff == 0) return total;

            if (diff < bestAns) {
                bestAns = diff;
                result = total;
            }

            if (total < target) {
                j ++;
            }
            else {
                k --;
            }

        }
    }

    return result;

}



console.log(threeSumClosest([-1, 2, 1, -4], 1));