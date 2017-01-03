<?php

$n = '/tmp/csvfile';
//$c = "a\nb\nc";
$c = "a\nb\nc\n";

file_put_contents($n, $c);
$f = fopen($n, 'r');

printf("%d\n", ftell($f));
var_dump(feof($f));

printf("\n");
var_dump(fgetcsv($f));
printf("%d\n", ftell($f));
var_dump(feof($f));

printf("\n");
var_dump(fgetcsv($f));
printf("%d\n", ftell($f));
var_dump(feof($f));

printf("\n");
var_dump(fgetcsv($f));
printf("%d\n", ftell($f));
var_dump(feof($f));

printf("\n");
var_dump(fgetcsv($f));
printf("%d\n", ftell($f));
var_dump(feof($f));

printf("\n");
rewind($f);
printf("%d\n", ftell($f));
var_dump(feof($f));

printf("\n");
fseek($f, 0, SEEK_END);
printf("%d\n", ftell($f));
var_dump(feof($f));

printf("\n");
fseek($f, -1, SEEK_END);
printf("%d\n", ftell($f));
var_dump(feof($f));

printf("\n");
fseek($f, 1, SEEK_END);
printf("%d\n", ftell($f));
var_dump(feof($f));

fclose($f);
unlink($n);
