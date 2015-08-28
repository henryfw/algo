

public class PrintLinkedListRecursively {
    public static void main(String args[]) {
        Node head = new Node(1);
        head.next = new Node(2);
        head.next.next = new Node(3);
        head.next.next.next = new Node(4);
        printReverse(head);
    }

    public static void printReverse(Node head) {
        if (head == null) return;
        printReverse(head.next);
        System.out.print(head.data + " ");
    }
}

class Node {
    int data;
    Node next;

    public Node(int data) {
        this.data = data;
    }
}

