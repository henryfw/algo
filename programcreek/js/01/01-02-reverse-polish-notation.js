function rpn(inputs) {

    var stack = [];
    var operators = ['+', '-', '*', '/'];

    inputs.forEach(function(v,k){

        if ( operators.indexOf(v) == -1 ) {
            stack.unshift(v);
        }
        else {
            var ans = 0;
            var var1 = parseInt(stack.shift());
            var var2 = parseInt(stack.shift());

            if (v == '+') ans = var2 + var1;
            if (v == '*') ans = var2 * var1;
            if (v == '/') ans = Math.floor( var2 / var1 );
            if (v == '-') ans = var2 - var1;

            stack.unshift(ans);
        }


    });

    return stack[0];

}



console.log( rpn(["2", "1", "+", "3", "*"]) )
console.log( rpn(["4", "13", "5", "/", "+"]) )