<?php

$data = 'the quick brown fox jumped over the lazy dog.';
file_put_contents('hash_file.data', $data);

$hash1 = hash('sha384', $data);
$hash2 = hash_file('sha384', 'hash_file.data');
printf("%s\n", $hash1);
printf("%s\n", $hash2);
if ($hash1 === $hash2) {
 echo "equal\n";
}
unlink('hash_file.data');
