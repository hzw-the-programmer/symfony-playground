<?php
class A {
    public function __call($name, $args) {
        printf("%s: %s=>%s\n", __METHOD__, $name, implode(',', $args));
    }
}

$a = new A();
$a->m1('arg1', 'arg2', 'arg3');
$a->m2('arg1', 'arg2', 'arg3');
