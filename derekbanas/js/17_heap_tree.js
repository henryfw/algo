function MinHeap(size) {
    this.size = 0;
    this.maxSize = size;
    this.data = new Array(size);
}

MinHeap.prototype.getMin = function() {
    if (this.size == 0 ) return null;
    return this.data[0];
}

MinHeap.prototype.getParentIndex = function(index) {
    return parseInt( (index-1) / 2 );
}

MinHeap.prototype.getLeftIndex = function(index) {
    return index * 2 + 1;
}

MinHeap.prototype.getRightIndex = function(index) {
    return index * 2 + 2;
}

MinHeap.prototype.add = function(value) {
    if (this.size >= this.maxSize) {
        throw new Error("Max size reached");
    }
    this.size ++;
    this.data[this.size - 1] = value;
    this.siftUp(this.size - 1);

}

MinHeap.prototype.siftUp = function(index) {
    if (index == 0) {
        return;
    }
    var parentIndex = this.getParentIndex(index) ;
    if (this.data[parentIndex] > this.data[index]) {
        var tmp = this.data[index];
        this.data[index] = this.data[parentIndex];
        this.data[parentIndex] = tmp;
        this.siftUp(parentIndex);
    }
}

MinHeap.prototype.removeMin = function() {
    if (this.size == 0) {
        return null;
    }
    var result = this.data[0];
    this.data[0] = this.data[this.size - 1];
    this.size --;
    this.siftDown(0);
    return result;
}

MinHeap.prototype.siftDown = function(index) {
    var leftIndex = this.getLeftIndex(index);
    var rightIndex = this.getRightIndex(index);
    var indexToUse = -1;
    if (leftIndex < this.size && this.data[leftIndex] < this.data[index]) {
        if (rightIndex < this.size) {
            indexToUse = this.data[leftIndex] <= this.data[rightIndex] ? leftIndex : rightIndex;
        }
        else {
            indexToUse = leftIndex;
        }
    }
    else if (rightIndex < this.size && this.data[rightIndex] < this.data[index]) {
        indexToUse = rightIndex;
    }
    if (indexToUse != -1) {
        var tmp = this.data[index];
        this.data[index] = this.data[indexToUse];
        this.data[indexToUse] = tmp;
        this.siftDown(indexToUse);
    }

}

MinHeap.prototype.sort = function() {
    var tmp = new MinHeap(this.maxSize);
    tmp.data = this.data.slice(0);
    tmp.size = this.size;
    var result = [];
    while (tmp.size > 0) {
        result.push(tmp.removeMin())
    }
    return result;
}

MinHeap.prototype.toString = function() {
    var value = "";
    var i = this.size ;
    while (i > 0) {
        i --;
        value = this.data[i] + ' ' + value;
    }
    return value;
}


var inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];
var tree = new MinHeap(100);

inputs.forEach(function(v) {
    tree.add(v);
});

console.log( tree + "" );
console.log( tree.sort() );
console.log( tree.removeMin());
console.log( tree + "" );

