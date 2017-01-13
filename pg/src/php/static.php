<?php

class A {
    public static function create() {
        //return new static;
        return new self;
    }
}

class B extends A {
}

class C extends B {
}

$a = A::create();
var_dump($a);
$b = B::create();
var_dump($b);
$c = C::create();
var_dump($c);
