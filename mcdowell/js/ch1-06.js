

function rotateMatrix2D(m) {

    var width = m.length;

    for (var layer = 0; layer < Math.floor(width/2); layer ++ ) {
        var first = layer;
        var last = width - 1 - layer;

        for ( var i = first; i < last; i ++) {

            var offset = i - first;

            // m[ y ][ x ]

            // top = m[first][i]
            // right = m[i][last]
            // bottom = m[last][last - offset]
            // left = m[last - offset][first]

            var top = m[first][i];

            // top <- left
            m[first][i] = m[last - offset][first];

            // left <- bottom
            m[last - offset][first] = m[last][last - offset];

            // bottom <- right
            m[last][last - offset] = m[i][last];

            // right <- top
            m[i][last] = top;


        }
    }
}


// ans[y][x]
var ans = [
    [1,2,3,4,5], // 1st row
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5],
];

rotateMatrix2D(ans);

console.log(ans)
