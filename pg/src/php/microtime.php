<?php

$microtime = microtime(true);
$microtimeStr = microtime();
printf("%f\n", $microtime);
list($msec, $sec) = explode(" ", $microtimeStr);
printf("%f\n", $msec + $sec);
printf("%s\n", $msec);
