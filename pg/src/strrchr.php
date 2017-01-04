<?php

$str = 'N;Mode;/path';
echo strrchr($str, ';') . "\n";
echo ltrim(strrchr($str, ';'), ';') . "\n";
