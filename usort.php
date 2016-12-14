<?php

$a = ['a' => 9, 'b' => 5, 'c' => 10, 'd' => 2];
//usort($a, function($a, $b) {
uasort($a, function($a, $b) {
    //return $a < $b ? -1 : 1;
    return $a > $b ? -1 : 1;
});
print_r($a);
