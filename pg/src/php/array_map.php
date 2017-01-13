<?php
$en = $argv[1] === 'en';
$in = $argv[2];
printf("%s\n", implode('', array_map(function ($c) use ($en) { $en ? $i=1 : $i=-1; return chr(ord($c) + $i);}, str_split($in))));
