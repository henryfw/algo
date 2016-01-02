function flattenBst(node) {
    var stack = [];

    var p = node;

    while (p || node.length) {
        if (p.right) {
            stack.push(p.right);
        }
        if (p.left) {
            p.right = p.left;
            p.left = null;
        }
        else if (node.length) {
            var t = stack.pop();
            p.right = t;
        }

        p = p.right;
    }
}