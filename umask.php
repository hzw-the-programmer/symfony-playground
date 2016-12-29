<?php

printf("%s\n", decoct(umask()));
//umask(0);
fopen('/tmp/a.test', 'w');
fopen('/tmp/b.test', 'w');
chmod('/tmp/a.test', 0666);
