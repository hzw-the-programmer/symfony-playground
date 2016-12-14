<?php

$a =['a' => 1, 'c' => null];
echo null === /*@*/$a['b'] ? "null\n" : "not null\n";
echo isset($a['c']) ? "is set\n" : "is not set\n";
echo array_key_exists('c', $a) ? "key exists\n" : "key not exists\n";
