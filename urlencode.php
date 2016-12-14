<?php

/*
$str = '1@a%b -^_';
$strencoded = urlencode($str);
echo $strencoded . "\n";
echo urldecode($strencoded) . "\n";
*/

$str = 'a1-_.~ !!@#$%^';
$str1 = urlencode($str);
echo "$str1\n";
$str1 = rawurlencode($str);
echo "$str1\n";
