<?php
$r = preg_match('/(foo)(bar)(baz)/', 'foobarbazafoobarbazbfoobarbazc', $match);
var_dump($r);
var_dump($match);
$r = preg_match('/(foo)(bar)(baz)/', 'foobarbazafoobarbazbfoobarbazc', $match, PREG_OFFSET_CAPTURE);
var_dump($r);
var_dump($match);
$r = preg_match('/(foo)(bar)(baz)/', '', $match, PREG_OFFSET_CAPTURE);
var_dump($r);
var_dump($match);
