<?php
class A {
    protected $a = 1;
    public function getA() {
        return $this->a;
    }
}

class B extends A {
    protected $a = 2;
}

$b = new B();
var_dump($b->getA());
