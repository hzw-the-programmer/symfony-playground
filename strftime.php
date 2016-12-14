<?php

echo setlocale('LC_TIME', 0) . "\n";
setlocale('LC_TIME', 'zh_CN.UTF-8');
echo setlocale('LC_TIME', 0) . "\n";
echo strftime('%a %A %d %b %B %Y') . "\n";
