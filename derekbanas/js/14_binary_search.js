
function Node(key) {
    this.key = key;
    this.left = null;
    this.right = null
}

Node.prototype.remove = function(key, parent) {
    if (key < this.key ) {
        if (this.left != null) {
            return this.left.remove(key, this);
        }
        else {
            return false;
        }
    }
    else if (key > this.key) {
        if (this.right != null) {
            return this.right.remove(key, this);
        }
        else {
            return false;
        }
    }
    else {
        if (this.left != null && this.right != null) {
            this.key = this.right.minValue();
            this.right.remove(this.key, this);
        }
        else if (parent.left == this) {
            if (this.left != null) {
                parent.left = this.left;
            }
            else {
                parent.left = this.right;
            }
        }
        else if (parent.right == this) {
            if (this.left != null) {
                parent.right = this.left;
            }
            else {
                parent.right = this.right;
            }
        }
        return true;
    }
}

Node.prototype.minValue = function() {
    if (this.left == null) {
        return this.key;
    }
    else {
        return this.left.minValue()
    }
}

Node.prototype.toString = function() {
    return String(this.key);
}


function BinaryTree() {
    this.root = null;
}

BinaryTree.prototype.add = function(key) {
    var newNode = new Node(key);
    if (this.root == null) {
        this.root = newNode;
    }
    else {
        var focusNode = this.root;
        while(1) {
            var tmp = focusNode;
            if (key < focusNode) {
                focusNode = focusNode.left;
                if (focusNode == null) {
                    tmp.left = newNode;
                    break;
                }
            }
            else {
                focusNode = focusNode.right;
                if (focusNode == null) {
                    tmp.right = newNode;
                    break;
                }
            }
        }
    }
}

BinaryTree.prototype.search = function(key) {
    var focusNode = this.root;
    while(1) {
        if (focusNode.key == key) {
            return focusNode;
        }
        if (key < focusNode.key) {
            focusNode = focusNode.left;
        }
        else {
            focusNode = focusNode.right;
        }
        if (focusNode == null) {
            return false;
        }
    }

}

BinaryTree.prototype.remove = function(key) {
    if (this.root.key == key) {
        var tmpRoot = new Node(0);
        tmpRoot.left = this.root;
        var result = this.root.remove(key, tmpRoot);
        this.root = tmpRoot;
        return result;
    }
    else {
        return this.root.remove(key, null);
    }
}

BinaryTree.prototype.inOrderTranverse = function(node) {
    if (node == null) return;
    this.inOrderTranverse(node.left);
    console.log(node + "");
    this.inOrderTranverse(node.right);
}


var inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];
var tree = new BinaryTree();

inputs.forEach(function(v) {
    tree.add(v);
});

console.log(tree.search(324) + "")

console.log(tree.remove(324))

tree.inOrderTranverse(tree.root);
