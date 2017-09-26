<?php
$page = $_POST['page'];
$rows = $_POST['rows'];
$sort = $_POST['sort'];
$order = $_POST['order'];

if (!$page) {
  $page = 1;
}
if (!$rows) {
  $rows = 10;
}
$offset = ($page - 1) * $rows;
$limit = " Limit $offset, $rows";

$orderby = '';
if ($sort && $order) {
  $sorts = explode(',', $sort);
  $orders = explode(',', $order);
  $len = count($sorts);
  for ($i = 0; $i < $len; $i++) {
    $orderby .= "$sorts[$i] $orders[$i]";
    if ($i != $len - 1) {
      $orderby .= ',';
    }
  }
}
if ($orderby) {
  $orderby = " ORDER BY $orderby";
}

try {
  $dbh = new PDO('mysql:host=127.0.0.1;dbname=iot0', 'hzw', '123456');
  $select = 'SELECT COUNT(*)';
  $from = ' FROM places AS p1
            LEFT OUTER JOIN places AS p2
            ON p1.id = p2.pid
            LEFT OUTER JOIN places AS p3
            ON p2.id = p3.pid
            LEFT OUTER JOIN places AS p4
            ON p3.id = p4.pid
            LEFT OUTER JOIN places AS p5
            ON p4.id = p5.pid
            LEFT OUTER JOIN places AS p6
            ON p5.id = p6.pid';
  $where = ' WHERE p1.pid = 0';
  $sth = $dbh->prepare($select . $from . $where);
  $sth->execute();
  $results['total'] = $sth->fetch()[0];

  $id = 'IFNULL(p6.id, IFNULL(p5.id, IFNULL(p4.id, IFNULL(p3.id, IFNULL(p2.id, IFNULL(p1.id, 0))))))';
  $select = "SELECT $id AS id, p1.name AS plant, p2.name AS workshop, p3.name AS region, p4.name AS line, p5.name AS station, p6.name AS channel";
  $sth = $dbh->prepare($select . $from . $where . $orderby . $limit);
  $sth->execute();
  $results['rows'] = $sth->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($results);

  $sth = null;
  $dbh = null;
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}
?>
