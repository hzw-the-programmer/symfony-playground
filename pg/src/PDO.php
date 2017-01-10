<?php
$dsn = 'mysql:host=localhost;dbname=cms1;charset=utf8';
//$dsn = 'mysql:host=localhost;dbname=cms1';
$usr = 'cms1user';
$pwd = 'xxxooo';
$opt = array();
//$opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
$dbh = new PDO($dsn, $usr, $pwd, $opt);
foreach($dbh->query('select catname from rt_category') as $row) {
    echo $row[0] . "\n";
    //echo mb_detect_encoding($row[0]) . "\n";
}
