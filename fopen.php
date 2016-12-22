<?php

//$file = fopen('/temp/a.test', 'r');
$file = fopen('/tmp/a.test', 'r+');
//$file = @fopen('/temp/a.test', 'r');
echo $file === false ? "false\n" : "$file\n";
