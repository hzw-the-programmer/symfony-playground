<?php

//$date = new DateTime('January 1st, 1970 GMT');
$date = new DateTime('January 1 1970 00:00:00 GMT');
//echo $date->getTimestamp() . "\n";
echo $date->format('U') . "\n";
$time = time();
$date->modify('+' . $time . ' seconds');
//echo $date->getTimestamp() . "\n";
echo $date->format('U') . "\n";
echo $time . "\n";
echo $date->format('F j Y H:i:s T') . "\n";

//$date1 = new DateTime('February 1 2017 00:00:00 +0000');
$date1 = new DateTime('February 1 2017 00:00:00 GMT');
//$date2 = new DateTime('February 1 2017 08:00:00 +0800');
//$date2 = new DateTime('February 1 2017 08:00:00 CST'); //wrong, don't know why.
$date2 = new DateTime('February 1 2017 08:00:00 Asia/Chongqing');
//$date2 = new DateTime('February 1 2017 08:00:00');
echo $date1->format('U') . "\n";
echo $date2->format('U') . "\n";
echo $date1->format('F j Y H:i:s T') . "\n";
echo $date2->format('F j Y H:i:s T') . "\n";
echo $date1->format('F j Y H:i:s P') . "\n";
echo $date2->format('F j Y H:i:s P') . "\n";
echo $date1->format('F j Y H:i:s O') . "\n";
echo $date2->format('F j Y H:i:s O') . "\n";
echo $date1->format('F j Y H:i:s e') . "\n";
echo $date2->format('F j Y H:i:s e') . "\n";
