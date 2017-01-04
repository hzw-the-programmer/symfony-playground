<?php

$a = 5.7;
$b = 1.3;
$format = "%-25s %f\n";
printf($format, "$a % $b", $a % $b);
printf($format, "fmod($a, $b)", fmod($a, $b));
printf($format, "(int)fmod($a, $b)", (int)fmod($a, $b));
