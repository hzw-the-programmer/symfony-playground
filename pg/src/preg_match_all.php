<?php

preg_match_all('/(?:(A)|(B))/', 'aaaaAaaaaBaaaaa', $matches, PREG_SET_ORDER);
var_dump($matches);

echo "\n";
preg_match_all('/(foo)(bar)(baz)/', 'foobarbazafoobarbazbfoobarbazc', $matches/*, PREG_PATTERN_ORDER*/);
var_dump($matches);

echo "\n";
preg_match_all('/(foo)(bar)(baz)/', 'foobarbazafoobarbazbfoobarbazc', $matches, /*PREG_PATTERN_ORDER | */PREG_OFFSET_CAPTURE);
var_dump($matches);

echo "\n";
preg_match_all('/(foo)(bar)(baz)/', 'foobarbazafoobarbazbfoobarbazc', $matches, PREG_SET_ORDER);
var_dump($matches);

echo "\n";
preg_match_all('/(foo)(bar)(baz)/', 'foobarbazafoobarbazbfoobarbazc', $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE);
var_dump($matches);
