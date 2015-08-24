
function fourSum(nums, target) {
    var result = []
    var done = {}

    nums.sort();

    for ( var i = 0; i < nums.length; i ++ ) {
        for ( var j = i + 1; j < nums.length; j ++ ) {
            var k = j + 1;
            var l = nums.length -1;

            while (k < l) {
                var total = nums[i] + nums[j] + nums[k] + nums[l];
                if (total > target) {
                    l --;
                }
                else if (total < target) {
                    k ++;
                }
                else {

                    var temp = [nums[i], nums[j], nums[k], nums[l]];
                    var tempKey = temp.join('|');

                    if (! (tempKey in done)) {
                        done[tempKey] = 1
                        result.push(temp)
                        k ++;
                        l --;
                    }
                }
            }
        }
    }

    return result;
}




console.log( fourSum([1, 0, -1, 0, -2, 2], 0) );