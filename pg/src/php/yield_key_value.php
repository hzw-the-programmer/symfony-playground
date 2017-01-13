<?php
function input_parser($input) {
    foreach(explode("\n", $input) as $line) {
        $fields = explode(';', $line);
        $id = array_shift($fields);
        yield $id => $fields;
    }
}

$input = <<<EOD
1;PHP;Likes dollar signs
2;Python;Likes whitespace
3;Ruby;Likes blocks
EOD;

foreach(input_parser($input) as $id => $fields) {
    echo "$id\n";
    echo "    $fields[0]\n";
    echo "    $fields[1]\n";
}
