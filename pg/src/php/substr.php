<?php
$s = 'abc{def}ghi{jkl}mno';
$p = 0;
preg_match_all('#\{\w+\}#', $s, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE);
foreach($matches as $match) {
    printf("%s\n", substr($s, $p, $match[0][1] - $p));
    $p = $match[0][1] + strlen($match[0][0]);
}
