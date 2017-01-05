<?php
function y1() {
    yield 1;
    yield 2;
    yield 3;
}

function y2() {
    yield 0;
    yield from y1();
    yield 4;
}

foreach(y2() as $k => $v) {
    echo "$k: $v\n";
}

var_dump(iterator_to_array(y2()));
var_dump(iterator_to_array(y2(), false));
