<?php

preg_match_all('/(?:(A)|(B))/', 'aaaaAaaaaBaaaaa', $matches, PREG_SET_ORDER);
foreach ($matches as $match) {
    var_dump($match);
}
