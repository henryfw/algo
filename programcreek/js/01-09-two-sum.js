

function twoSum(list, target) {
    for (var i = 0; i < list.length - 1; i ++){
        for (var j = i + 1; j < list.length ; j++) {
            if (list[i] + list[j] == target) {
                return [i, j];
            }
        }
    }
    return null;
}


function twoSumWithHash(list, target) {
    var table = {}
    for (var i = 0; i < list.length; i ++) {
        if (typeof table[ list[i] ] != 'undefined' ) {
            return [ table[list[i]] , i ]
        }
        else {
            table[ target - list[i] ] = i;
        }
    }
    return null;
}


function twoSumWithSortedInput(list, target) {
    var start = 0;
    var end = list.length - 1;
    while (start < end) {
        var sum = list[start] + list[end];
        if (sum == target) return [start, end];
        if (sum < target) start ++;
        else end --;
    }
    return null;
}

function TwoSumData(){
    this.table = {}
}

TwoSumData.prototype.add = function(i) {
    if (typeof this.table[i] == 'undefined') {
        this.table[i] = 0;
    }
    this.table[i] += 1
}

TwoSumData.prototype.find = function(target) {
    for (var i in this.table) {
        var reminder = target - i;
        if (typeof this.table[reminder] != 'undefined') {
            if (i == reminder && this.table[reminder] < 2) {
                continue;
            }
            return true;
        }
    }
    return false;
}


console.log(twoSum([2,7,11,15], 22));

console.log(twoSumWithHash([2,7,11,15], 22));

console.log(twoSumWithSortedInput([2,7,11,15,16,19,23,33], 30));


var c = new TwoSumData();
c.add(1);
c.add(3);
c.add(7);
console.log(c.find(4));
console.log(c.find(7));
console.log(c.find(6));