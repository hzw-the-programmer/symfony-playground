<?php

echo date_default_timezone_get() . "\n";
echo date('D, d-M-Y H:i:s T') . "\n";
echo gmdate('D, d-M-Y H:i:s T') . "\n";
echo mktime(19) . "\n";
echo mktime(11) . "\n";
echo time() . "\n";
echo date('H') . "\n";
date_default_timezone_set('GMT');
echo date_default_timezone_get() . "\n";
echo date('D, d-M-Y H:i:s T') . "\n";
echo gmdate('D, d-M-Y H:i:s T') . "\n";
echo mktime(11) . "\n";
echo mktime(19) . "\n";
echo time() . "\n";
echo date('H') . "\n";

date_default_timezone_set('Asia/Singapore');
echo date_default_timezone_get() . "\n";
echo date('D, d-M-Y H:i:s T') . "\n";
