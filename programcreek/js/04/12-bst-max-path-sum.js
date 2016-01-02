

function maxPathSum(root) {
    if (!root) return 0;

    var max = { value: Number.NEGATIVE_INFINITY };

    calcSum(root, max);

    return max.value;
}


function calcSum(root, max) {

    if (!root) return 0;

    var left = calcSum(root.left, max);
    var right = calcSum(root.right, max);

    var current = Math.max(root.val, root.val + left);
    current = Math.max(current, root.val + right);
    current = Math.max(current, root.val + right + left);

    max.value = Math.max(max.value, current);

    return current;
}