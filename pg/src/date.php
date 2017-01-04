<?php

echo "\n";
echo date(DATE_ATOM) . "\n";
echo date(DATE_RFC3339) . "\n";
echo date(DATE_W3C) . "\n";

echo "\n";
echo date(DATE_ISO8601) . "\n";
echo date(DATE_COOKIE) . "\n";
echo date(DATE_RFC850) . "\n";

echo "\n";
echo date(DATE_RFC822) . "\n";
echo date(DATE_RFC1036) . "\n";

echo "\n";
echo date(DATE_RSS) . "\n";
echo date(DATE_RFC1123) . "\n";
echo date(DATE_RFC2822) . "\n";

echo "\n";
$date1 = new DateTime('January 24th, 2017');
echo $date1->format('F jS, Y') . "\n";
$date2 = new DateTime('February 4th, 2017');
echo $date2->format('F jS, Y') . "\n";
$interval = $date1->diff($date2);
echo $interval->format('%R%a days') . "\n";
//var_dump($interval);

echo "\n";
$date1 = new DateTime('November 29th, 2016');
echo $date1->format('F jS, Y H:i:s') . "\n";
$date2 = new DateTime('March 1st, 2017');
echo $date2->format('F jS, Y H:i:s') . "\n";
$interval = $date1->diff($date2);
echo $interval->format('%R%a days') . "\n";

echo "\n";
$date1 = new DateTime('November 29, 2016');
echo $date1->format('F jS, Y') . "\n";
//$date1->add(new DateInterval('P92D'));
$date1->modify('+92 days');
echo $date1->format('F jS, Y') . "\n";

echo "\n";
$date1 = new DateTime('now');
echo $date1->format('F jS, Y H:i:s') . "\n";
//$date1->modify('+2 days');
$date1->modify('+1 days');
echo $date1->format('F jS, Y H:i:s') . "\n";
$date1->modify('+1 month');
echo $date1->format('F jS, Y H:i:s') . "\n";
$date1->modify('+1 month');
echo $date1->format('F jS, Y H:i:s') . "\n";
$date1->modify('+1 month');
echo $date1->format('F jS, Y H:i:s') . "\n";
$date1 = new DateTime('today');
echo $date1->format('F jS, Y H:i:s') . "\n";
$date1 = new DateTime('tomorrow');
echo $date1->format('F jS, Y H:i:s') . "\n";

echo "\n";
//$date1 = new DateTime('2017/03/31');
$date1 = new DateTime('2017/03/30');
echo $date1->format('F jS, Y') . "\n";
$date1->modify('+1 month');
echo $date1->format('F jS, Y') . "\n";
