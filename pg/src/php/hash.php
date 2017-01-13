<?php

$data = 'hello';

foreach (hash_algos() as $ha) {
    $h = hash($ha, $data);
    printf("%-12s %3s %s\n", $ha, strlen($h), $h);
}

echo "\n";
$h1 = hash('sha384', $data);
$h2 = bin2hex(hash('sha384', $data, true));
echo "$h1\n";
echo "$h2\n";
if ($h1 === $h2) {
    echo "equal\n";
}

echo PHP_EOL;
echo hash('tiger192,3', 'a-string'), PHP_EOL;
echo strlen(hash('tiger192,3', 'a-string')), PHP_EOL;

function old_tiger($data = '', $width = 192, $rounds = 3) {
    return substr(implode(array_map(function ($d) {
                                  return str_pad(bin2hex(strrev($d)), 16, '0');
                              },
                              str_split(hash("tiger192,$rounds", $data, true), 8)
                          )
                  ),
           0, 48 - (192 - $width) / 4);
}
echo old_tiger('a-string'), PHP_EOL;

echo PHP_EOL;
echo strlen(hash('md5', '', true)) . PHP_EOL;
echo strlen(hash('md5', '', true)) * 64000 . PHP_EOL;
echo 'Building random data...' . PHP_EOL;
$data = '';
for ($i = 0; $i < 64000; $i++) {
    $data .= hash('md5', rand(), true);
}
echo strlen($data) . ' bytes of random data built!' . PHP_EOL . PHP_EOL . 'Testing hash algorithms...' . PHP_EOL;

$results = [];
foreach (hash_algos() as $ha) {
    $time = microtime(true);
    hash($ha, $data);
    $time = microtime(true) - $time;
    //$results[$time * 1e6][] = "$ha (hex)";
    $results[$time * 1e9][] = "$ha (hex)";

    $time = microtime(true);
    hash($ha, $data, true);
    $time = microtime(true) - $time;
    //$results[$time * 1e6][] = "$ha (raw)";
    $results[$time * 1e9][] = "$ha (raw)";
}

ksort($results);

$i = 1;
foreach ($results as $t => $a) {
    foreach ($a as $s) {
        echo str_pad($i++ . '.', 4, ' ', STR_PAD_LEFT) . ' ' . str_pad($s, 30, ' ') . ' ' . $t . PHP_EOL;
    }
}
