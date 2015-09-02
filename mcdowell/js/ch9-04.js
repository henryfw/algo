function getAllSubSet(inputs, index) {
    if (index < 0) return [[]];

    var ans = getAllSubSet(inputs, index - 1);
    var newAns = ans.slice(0);

    var newInputItem = inputs[index];

    ans.forEach(function(v,k) {
        var newV = v.slice(0);
        newV.push(newInputItem);
        newAns.push(newV);
    });

    return newAns;
}


console.log(getAllSubSet([1,2,3], 2));

