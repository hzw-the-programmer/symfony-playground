<?php

$msg = "Hello";
//$func = function() {
//$func = function() use ($msg) {
$func = function() use (&$msg) {
    echo "$msg\n";
};
$func();
$msg = "World";
$func();
