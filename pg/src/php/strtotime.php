<?php

echo date('l, Y.m.d', strtotime('24 January 2017')) . "\n";
echo date('l, jS F Y', strtotime('2 February 2017')) . "\n";

echo "\n";

$gmt = strtotime('january 23rd 2017 00:00:00 GMT');
//$singapore = strtotime('january 23rd 2017 00:00:00 Asia/Singapore');
$singapore = strtotime('january 23rd 2017 00:00:00');
echo $gmt . "\n";
echo $singapore . "\n";
echo ($gmt - $singapore) / 60 / 60 . "\n";
echo date('F jS Y H:i:s e', $gmt) . "\n";
echo date('F jS Y H:i:s e', $singapore) . "\n";
echo gmdate('F jS Y H:i:s e', $gmt) . "\n";
echo gmdate('F jS Y H:i:s e', $singapore) . "\n";

echo "\n";

$gmt = strtotime('january 23rd 2017 00:00:00 GMT');
$singapore = mktime(0, 0, 0, 1, 23, 2017);
echo ($gmt - $singapore) / 60 / 60 . "\n";

$ts = strtotime('+2 weeks');
echo date('F j Y H:i:s e', $ts) . "\n";
echo gmdate('F j Y H:i:s e', $ts) . "\n";

echo "\n";

$w = 20;
$f = "%-{$w}s: %s\n";
$time = time();
printf($f, date_default_timezone_get(), date('F j Y H:i:s e P', $time));
date_default_timezone_set('America/Los_Angeles');
printf($f, date_default_timezone_get(), date('F j Y H:i:s e P', $time));
date_default_timezone_set('America/New_York');
printf($f, date_default_timezone_get(), date('F j Y H:i:s e P', $time));
