<?php

$n = '/tmp/afile';
$c = "12345";

file_put_contents($n, $c);

$f = fopen($n, 'r');

/*
while(!feof($f)) {
    var_dump(fgetc($f));
}
*/
while (($c = fgetc($f)) !== false) {
    var_dump($c);
}

fclose($f);
unlink($n);
