function pickRandomSubset(inputs, m) {

    var subset = inputs.slice(0, m);

    for (var i = m; i < inputs.length; i ++) {
        var k = Math.floor( Math.random() * (i+1) );
        if (k < m) {
            subset[k] = inputs[i];
        }
    }

    return subset;

}

for (var i = 0; i < 100; i ++) {
    console.log(pickRandomSubset([1,2,3,4,5], 3));
}
