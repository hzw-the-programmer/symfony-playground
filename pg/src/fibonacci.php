<?php
function fibonacci() {
    $a = 0;
    $b = 1;
    yield($a);
    yield($b);
    while (true) {
        $b = $a + $b;
        $a = $b - $a;
        yield $b;
    }
}

$fib = fibonacci();
var_dump($fib);
foreach($fib as $i) {
    if ($i > 10) break;
    echo "$i\n";
}
