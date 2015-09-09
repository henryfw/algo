function shuffleDeck(inputs) {
    for(var i = 0; i < inputs.length; i ++) {
        var k = Math.floor(Math.random() * (i + 1));
        var tmp = inputs[k];
        inputs[k] = inputs[i];
        inputs[i] = tmp;
    }

    return inputs;
}

for (var i = 0; i < 100; i ++) {
    console.log(shuffleDeck([1,2,3,4,5]));
}
