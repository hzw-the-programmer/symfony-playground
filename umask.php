<?php

$file = '/tmp/afile';
printf("---create---\n");
printf("umask:%o\n", umask());
fopen($file, 'w');
printf("perms:%o\n", fileperms($file));

unlink($file);
umask(0);

printf("---create---\n");
printf("umask:%o\n", umask());
fopen($file, 'w');
printf("perms:%o\n", fileperms($file));

unlink($file);
umask(2);

printf("---chmod---\n");
printf("umask:%o\n", umask());
fopen($file, 'w');
printf("perms:%o\n", fileperms($file));
chmod($file, 0666);
clearstatcache();
printf("perms:%o\n", fileperms($file));

unlink($file);
