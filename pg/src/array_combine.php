<?php

$a = ['a' => 'A', 'b' => 'B'];
$b = ['b' => 'B', 'a' => 'A'];
print_r(array_combine($a, $b));

$a = ['a' => 'A', 'b' => 'B'];
$b = ['c' => 'B', 'd' => 'A'];
print_r(array_combine($a, $b));
