<?php

$a = '&<>abcd -"\'@_!';

$b = htmlspecialchars($a); //ENT_COMPT | ENT_HTML401 //0000 0010
echo $b . "\n";

$b = htmlspecialchars($a, ENT_QUOTES); //ENT_QUOTES | ENT_HTML401 //0000 0011
echo $b . "\n";

$b = htmlspecialchars($a, ENT_HTML5); //0011 0000
echo $b . "\n";

$b = htmlspecialchars($a, ENT_QUOTES | ENT_HTML401); //0000 0011
echo $b . "\n";

$b = htmlspecialchars($a, ENT_QUOTES | ENT_HTML5); //0011 0011
echo $b . "\n";

$c = htmlentities($a, ENT_COMPAT | ENT_HTML5);
echo $c . "\n";
echo htmlspecialchars_decode($b) . "\n";

//print_r(get_html_translation_table(HTML_SPECIALCHARS));
//print_r(get_html_translation_table(HTML_ENTITIES));
