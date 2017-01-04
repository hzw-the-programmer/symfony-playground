<?php

//$a = preg_split('/,|("[^"]+")/', 'a,"b,c,d",e', 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
$a = preg_split('/,|"([^"]+)"/', 'a,"b,c,d",e', 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
print_r($a);
