<?php

$tree = ['a' => ['b' => ['d', 'e'], 'c' => ['f', 'g']]];
foreach(new RecursiveIteratorIterator(new RecursiveArrayIterator($tree)) as $key => $value) {
    echo "$key = $value\n";
}

echo "\n";

foreach(new RecursiveIteratorIterator(new RecursiveArrayIterator($tree), RecursiveIteratorIterator::SELF_FIRST) as $key => $value) {
    echo "$key = $value\n";
}

echo "\n";

foreach(new RecursiveIteratorIterator(new RecursiveArrayIterator($tree), RecursiveIteratorIterator::CHILD_FIRST) as $key => $value) {
    echo "$key = $value\n";
}
