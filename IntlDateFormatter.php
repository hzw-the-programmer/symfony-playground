<?php

$formatter = new IntlDateFormatter('zh_CN', null, null);
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN@calendar=chinese', null, null, null, IntlDateFormatter::TRADITIONAL);
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN@calendar=chinese', null, null, null);
echo $formatter->format(time()) . "\n";

echo "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::LONG, IntlDateFormatter::LONG);
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::MEDIUM, IntlDateFormatter::MEDIUM);
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::NONE, IntlDateFormatter::NONE);
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::NONE, IntlDateFormatter::LONG);
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
echo $formatter->format(time()) . "\n";

echo "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::NONE, IntlDateFormatter::FULL);
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::NONE, IntlDateFormatter::FULL, null, null, 'yyyy-MM-dd');
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
echo $formatter->format(time()) . "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::FULL, IntlDateFormatter::NONE, null, null, 'hh:mm:ss');
echo $formatter->format(time()) . "\n";

echo "\n";
$formatter = new IntlDateFormatter('zh_CN', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
echo $formatter->getPattern() . "\n";

echo "\n";
$formatter = new IntlDateFormatter(null, IntlDateFormatter::FULL, IntlDateFormatter::FULL);
echo $formatter->getPattern() . "\n";
echo $formatter->format(time()) . "\n";
