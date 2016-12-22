<?php

//$dateTime = new DateTime(sprintf('@%s', time()));
$dateTime = new DateTime(sprintf('@%s', time()), new DateTimeZone('Asia/Chongqing'));
//$dateTime->setTimezone(new DateTimeZone('Asia/Chongqing'));
echo $dateTime->getTimezone()->getName() . "\n";
echo $dateTime->format('Y-m-d H:i:s P') . "\n";

echo "\n";
$dateTime = new DateTime();
$dateTime->setTimestamp(time());
echo $dateTime->getTimezone()->getName() . "\n";
echo $dateTime->format('Y-m-d H:i:s P') . "\n";

echo "\n";
$time = time() + 10 * 60 * 60;
echo gmdate('Y-m-d H:i:s P', $time) . "\n";
echo date('Y-m-d H:i:s P', $time) . "\n";
echo gmdate('Y-m-d', $time) . "\n";
echo date('Y-m-d', $time) . "\n";
