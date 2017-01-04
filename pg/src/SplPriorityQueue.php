<?php

$q = new SplPriorityQueue;
$q->insert('A', 10);
$q->insert('B', 5);
$q->insert('C', 8);
$q->insert('D', 3);
$q->insert('E', 10);
$q->insert('F', 5);

//print_r($q);
//var_dump($q);
foreach ($q as $i)
    echo "$i\n";

echo "\n";

$q = new SplPriorityQueue;
$q->insert('A', [10, 100]);
$q->insert('B', [5, 99]);
$q->insert('C', [8, 98]);
$q->insert('D', [3, 97]);
//$q->insert('E', [8, 99]);
//$q->insert('E', [8, 98]);
//$q->insert('F', [8, 98]);
$q->insert('E', [8, 96]);
$q->insert('F', [8, 95]);
$q->insert('G', [10, 100]);
//var_dump($q);
foreach ($q as $i)
    echo "$i\n";
