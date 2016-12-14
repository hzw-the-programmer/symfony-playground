<?php

class A {
    public $str = 'string';
    public $int = '100';
    public $array = ['a', 'b', 'c', [1, 2, 3]];
    public $object;

    public function __construct() {
        echo __METHOD__ . "\n";
        $this->object = new stdclass;
    }

    public function __clone() {
        echo __METHOD__ . "\n";
        $this->object = clone $this->object;
    }
}

$a = new A;
$b = clone $a;
$b->str = 'b';
$b->int = 200;
$b->array[3][] = 4;
$b->array[] = 'd';
$b->object->p1 = 'p1';
var_dump($a);
var_dump($b);
