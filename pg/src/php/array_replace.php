<?php

$a1 = ['a', 'kb' => 'b', 'c', 'kd' => 'd'];
$a2 = ['1', 'kb' => '2', '3', 'kd' => '4'];
print_r($a1);
print_r($a2);
$r = array_replace($a1, $a2);
print_r($a1);
print_r($a2);
print_r($r);
$r = array_merge($a1, $a2);
print_r($r);
