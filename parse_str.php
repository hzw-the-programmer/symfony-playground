<?php

$str = http_build_query([
    'foo' => 'bar',
    'aa aa' => 'bb bb',
    'a@a' => 'b@b',
    'a3-_.~ !@#$%^' => 'a3-_.~ !@#$%^',
    'a[]' => 'b',
    '123',
    'b[foo]' => 'foo',
    'b[bar]' => 'bar',
    'a<test>' => '<>"\'',
], 'pre', '&', PHP_QUERY_RFC3986);
//]);
echo $str . "\n";
parse_str($str, $a);
print_r($a);

$str = "a3-_.~ !@#$%^";
$a = rawurlencode($str);
$b = urlencode($str);
echo $a . "\n";
echo $b . "\n";
echo rawurldecode($a) . "\n";
echo rawurldecode($b) . "\n";
echo urldecode($a) . "\n";
echo urldecode($b) . "\n";
