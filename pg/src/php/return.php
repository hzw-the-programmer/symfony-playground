<?php
function a() {
    echo __FUNCTION__ . "\n";
}
function b() {
    echo __FUNCTION__ . "\n";
    return;
}
var_dump(a());
var_dump(b());
