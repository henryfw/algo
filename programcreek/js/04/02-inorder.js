function inorder(root) {
    var ans = [];

    if (!root) return ans;

    var stack = [];
    var p = root;

    while (stack.length || p) {
        if (p) {
            stack.push(p);
            p = p.left;
        }

        else {
            var n = stack.pop();
            ans.push(n);
            p = n.right;
        }
    }

    return ans;
}