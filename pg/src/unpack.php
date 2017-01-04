<?php

$bs = pack('nvc*', 0x1234, 0x5678, 65, 66);
$hs = bin2hex($bs);
printf("%s\n", $hs);

$bs = hex2bin($hs);
$a = unpack('nbe/vle/c*c', $bs);
printf("%x\n", $a['be']);
printf("%x\n", $a['le']);
printf("%d\n", $a['c1']);
printf("%d\n", $a['c2']);
