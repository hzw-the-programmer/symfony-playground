<?php

echo microtime() . PHP_EOL;
printf("%f\n", microtime(true));
printf("%d\n", time());

echo PHP_EOL;
$time = microtime(true);
printf("%f\n", $time);
printf("%.16f\n", $time);
usleep(100);
$time = microtime(true) - $time;
printf("%f\n", $time);
printf("%.16f\n", $time);
printf("%f\n", $time * 1e9);
printf("%f\n", $time * 1e6);
