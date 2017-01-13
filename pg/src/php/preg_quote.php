<?php
$s = '\+*?[^]$(){}=!<>|:-';
printf("%s\n", preg_quote($s));

$s = '$40 for g3/400';
printf("%s\n", '/' . preg_quote($s) . '/');
printf("%s\n", '/' . preg_quote($s, '/') . '/');
