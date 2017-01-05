<?php
function sum(...$numbers) {
    $acc = 0;
    foreach ($numbers as $num) {
        $acc += $num;
    }
    return $acc;
}

echo sum(1, 2, 3, 4) . "\n";

function add($a, $b) {
    return $a + $b;
}

echo add(...[1, 2]) . "\n";
$p = [1, 2];
echo add(...$p) . "\n";

function total_intervals($unit, DateInterval ...$intervals) {
    $total_intervals = 0;
    foreach ($intervals as $interval) {
        $total_intervals += $interval->$unit;
    }
    return $total_intervals;
}

$d1 = new DateInterval('P3D');
$d2 = new DateInterval('P4D');
echo total_intervals('d', $d1, $d2) . "\n";

function debug($f) {
    printf("***%s***\n", $f->getName());
    $ps = $f->getParameters();
    foreach ($ps as $p) {
        printf("%20s: %s\n", 'name', $p->getName());
        printf("%20s: %s\n", 'is optional', $p->isOptional() ? 'true' : 'false');
        printf("%20s: %s\n", 'allows null', $p->allowsNull() ? 'true' : 'false');
    }
}
debug(new ReflectionFunction('sum'));
debug(new ReflectionFunction('add'));
debug(new ReflectionFunction('total_intervals'));

echo sum(null) . "\n";
echo total_intervals('d', null) . "\n";
