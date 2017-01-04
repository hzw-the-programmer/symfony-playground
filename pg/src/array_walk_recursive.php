<?php

$sweet = ['a' => 'apple', 'b' => 'banana'];
$fruits = ['sweet' => $sweet, 'sour' => 'lemon'];

array_walk_recursive($fruits, function ($item, $key) {
    echo "$key holds $item\n";
});

echo "\n";

array_walk($fruits, function ($item, $key) {
    echo "$key holds $item\n";
});
