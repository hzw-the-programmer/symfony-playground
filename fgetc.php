<?php

$n = '/tmp/afile';
$c = "12345";

file_put_contents($n, $c);

$f = fopen($n, 'r');

while(!feof($f)) {
    var_dump(fgetc($f));
}
