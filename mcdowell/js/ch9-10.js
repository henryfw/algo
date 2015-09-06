var cache = {};


function createStack(boxes, bottom) {
    if (typeof cache[bottom] != 'undefined') {
        return cache[bottom];
    }

    var maxHeight = 0;
    var maxStack = [];

    for ( var i = 0; i < boxes.length; i ++ ) {
        if (boxes[i] > bottom) {
            var newStack = createStack(boxes, boxes[i]);
            var newHeight = newStack.reduce(function(pv, cv) { return pv + cv; }, 0);
            if (newHeight > maxHeight) {
                maxHeight = newHeight;
                maxStack = newStack;
            }
        }
    }

    maxStack.unshift(bottom);
    cache[bottom] = maxStack;
    return maxStack;
}


console.log(createStack([1,2,3,4,5,6], 1))