<?php

$a = ['a' => 1, 'b' => 2];
//$b = ['a' => 1, 'b' => 2];
$b = ['b' => 2, 'a' => 1];
if ($a === $b) {
//if ($a == $b) {
    echo "equals\n";
} else {
    echo "not equals\n";
}
