

function PrefixTree(string) {
    this.root = new PrefixTreeNode();

    for (var i = 0, ii = string.length; i < ii; i ++) {
        this.root.insertString(string.substr(i), i);
    }
}

PrefixTree.prototype.search = function (string) {
    return this.root.search(string);
}


function PrefixTreeNode() {
    this.children = {};
    this.indexes = [];
}

PrefixTreeNode.prototype.insertString = function (string, index) {

    if (typeof string == 'string' && string.length > 0) {

        var firstLetter = string.charAt(0);
        var child;

        if (firstLetter in this.children) {
            child = this.children[firstLetter];
        }
        else {
            child = new PrefixTreeNode();
            this.children[firstLetter] = child;
        }

        child.indexes.push(index);
        child.insertString(string.substr(1), index);

    }
}


PrefixTreeNode.prototype.search = function(string) {
    if (string.length == 0) {
        return this.indexes;
    }

    var firstLetter = string.charAt(0);

    if (firstLetter in this.children) {
        return this.children[firstLetter].search(string.substr(1));
    }

    return -1;

}


var tree = new PrefixTree("bibs");

console.log(tree.search('ib'));
console.log(tree.search('bib'));