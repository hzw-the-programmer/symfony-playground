<?php
var_dump(is_callable('a'));
var_dump(is_callable('b'));
function a() {
}
var_dump(is_callable(['A', 'sm']));
var_dump(is_callable(['A', 'm']));
var_dump(is_callable(['A', 'nm']));
var_dump(is_callable([new A, 'sm']));
var_dump(is_callable([new A, 'm']));
var_dump(is_callable([new A, 'nm']));
class A {
    static function sm() {}
    function m() {}
}
