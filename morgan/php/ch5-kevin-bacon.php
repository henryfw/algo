<?php

class Actor {
    public $name;
    public $links = [];
    public $dist = -1;
    public function __construct($name) {
        $this->name = $name;
    }
    public function addLink(Actor $node) {
        if (!in_array($node, $this->links)) {
            $this->links[] = $node;
        }
        if (!in_array($this, $node->links)) {
            $node->links[] = $this;
        }
    }


    // called by the bacon node
    public function setBaconNumbers() {
        $openList = new SplQueue();
        $openList->enqueue($this);
        while(!$openList->isEmpty()) {
            $current = $openList->dequeue();

            foreach($current->links AS $v) {
                if ($v->dist == -1) {
                    $v->dist = $current->dist + 1;
                    $openList->enqueue($v);
                }
            }
        }
    }

    public function __toString() {
        return "{$this->name} {$this->dist} ";
    }
}

$bacon = new Actor('Kevin Bacon');
$bacon->dist = 0;
$actor1 = new Actor('Actor1');
$actor2 = new Actor('Actor2');
$actor3 = new Actor('Actor3');
$actor4 = new Actor('Actor4');
$actor5 = new Actor('Actor5');

$bacon->addLink($actor1);
$bacon->addLink($actor5);
$actor1->addLink($actor2);
$actor2->addLink($actor3);
$actor2->addLink($actor4);
$actor4->addLink($actor5);

$bacon->setBaconNumbers();


echo "1: $actor1\n";
echo "2: $actor2\n";
echo "3: $actor3\n";
echo "4: $actor4\n";
echo "5: $actor5\n";