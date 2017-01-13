<?php

$a = ['a' => 'green', 'red', 'b' => 'green', 'blue', 'red'];
var_dump(array_unique($a));

$a = [10, '10', '9', 9, 10, '12'];
var_dump(array_unique($a));

class O {
    private $str;
    function __construct($str) {
        $this->str = $str;
    }
    function __toString() {
        return $this->str;
    }
}
$a = [new O('a'), new O('a'),new O('b'), new O('a'), new O('b'), new O('c')];
var_dump(array_unique($a));
