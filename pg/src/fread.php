<?php

$file = fopen('IntlDateFormatter.php', 'r');
$line = fread($file, 7);
$line = urlencode($line);
echo "$line\n";
echo ftell($file) . "\n";
$line = fread($file, 1);
echo "$line\n";
echo ftell($file) . "\n";

//fseek($file, 0, SEEK_END);
fseek($file, -2, SEEK_END);
//fseek($file, -1, SEEK_END);
echo ftell($file) . "\n";
$line = fread($file, 1);
echo "$line\n";
echo ftell($file) . "\n";
