<?php
function fibonacci($max) {
    $a = 1;
    $b = 1;
    yield($a);
    yield($b);
    while (($n = $a + $b) < $max) {
        yield $n;
        $a = $b;
        $b = $n;
    }
}

$fib = fibonacci(10);
var_dump($fib);
foreach($fib as $i) {
    echo "$i\n";
}
