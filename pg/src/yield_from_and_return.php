<?php
function y1to10() {
    yield 1;
    yield 2;
    yield from [3, 4];
    yield from new ArrayIterator([5, 6]);
    yield from y7to8();
    return yield from y9return10();
}

function y7to8() {
    yield 7;
    yield 8;
}

function y9return10() {
    yield 9;
    return 10;
}

$g = y1to10();
foreach ($g as $k => $v) {
    echo "$k: $v\n";
}
echo $g->getReturn() . "\n";

$g = y1to10();
echo $g->getReturn() . "\n";
