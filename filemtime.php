<?php

$file = '/tmp/afile';

fopen($file, 'w');
debug($file, 'create');

sleep(1);
fopen($file, 'w');
debug($file, 'truncate');

sleep(1);
file_get_contents($file);
debug($file, 'read');

sleep(1);
file_put_contents($file, 'afile');
debug($file, 'write');

sleep(1);
chmod($file, 0666);
debug($file, 'chmod');

unlink($file);

function debug($file, $op) {
    clearstatcache();
    echo "---$op---\n";
    echo "access time:" . date('h:i:s', fileatime($file)) . "\n";
    echo "modify time:" . date('h:i:s', filemtime($file)) . "\n";
    echo "change time:" . date('h:i:s', filectime($file)) . "\n";
}
