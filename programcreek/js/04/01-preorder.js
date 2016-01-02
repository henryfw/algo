function preorder(root) {
    var stack = [root];

    var ans = [];

    while(stack.length) {
        var n = stack.pop();

        ans.push(n);

        if (n.right) stack.push(n.right);
        if (n.left) stack.push(n.left);
    }


    return ans;
}