<?php
$dbh = new PDO('mysql:host=localhost;dbname=cms1', 'cms1user', 'xxxooo', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
foreach($dbh->query('select catname from rt_category') as $row) {
    //var_dump($row);
    echo $row[0] . "\n";
    //echo mb_detect_encoding($row[0]) . "\n";
}
