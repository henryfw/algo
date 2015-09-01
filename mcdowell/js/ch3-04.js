function Tower() {
    this.disks = [];
}
Tower.prototype.add = function (d){
    this.disks.push(d);
}
Tower.prototype.moveTopTo = function(other) {
    var top = this.disks.pop();
    other.add( top );
}
Tower.prototype.moveDisks = function(n, dest, buffer) {
    if (n > 0)  {
        this.moveDisks(n - 1, buffer, dest);
        this.moveTopTo(dest);
        buffer.moveDisks(n - 1, dest, this);
    }
}


var n = 3;
var towers = [];
for (var i = 0; i < 3; i ++) {
    towers.push(new Tower());
}
for (var i = n - 1; i >= 0; i -- ) {
    towers[0].add(i);
}
towers[0].moveDisks(n, towers[2], towers[1]);

console.log(towers)