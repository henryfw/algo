import java.util.ArrayList;

public class ch9_10 {
    public int counter = 0;

    public ArrayList<Box> createStackR(Box[] boxes, Box bottom) {
        this.counter ++;

        int max_height = 0;

        ArrayList<Box> max_stack = null;
        for (int i = 0; i < boxes.length; i++) {
            if (boxes[i].canBeAbove(bottom)) {
                ArrayList<Box> new_stack = createStackR(boxes, boxes[i]);
                int new_height = stackHeight(new_stack);
                if (new_height > max_height) {
                    max_stack = new_stack;
                    max_height = new_height;
                }
            }
        }

        if (max_stack == null) {
            max_stack = new ArrayList<Box>();
        }
        if (bottom != null) {
            max_stack.add(0, bottom); // Insert in bottom of stack
        }

        return max_stack;
    }

    public int stackHeight(ArrayList<Box> boxes) {
        int total = 0;
        for(Box box : boxes) {
            total += box.h;
        }
        return total;
    }

    public static void main(String[] args) {
        Box[] boxes = new Box[] {
                new Box(1,1,1),
                new Box(2,2,2),
                new Box(23,23,23),
                new Box(14,14,14),
                new Box(5,5,5)
        };

        ch9_10 test = new ch9_10();
        ArrayList<Box> ans = test.createStackR(boxes, boxes[0]);
        for (Box box : ans) {
            System.out.println("Box " + box.h);
        }
        System.out.println("Counter " + test.counter);
    }

}


class Box {
    int w;
    int d;
    int h;

    public Box(int w, int d, int h) {
        this.w = w;
        this.d = d;
        this.h = h;
    }
    public boolean canBeAbove(Box other) {
        return w > other.w && d > other.d && h > other.h;
    }
}