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

try {
  $dbh = new PDO('mysql:host=127.0.0.1;dbname=iot0', 'hzw', '123456');
  $sth = $dbh->prepare('SELECT COUNT(*) FROM places');
  $sth->execute();
  $results['total'] = $sth->fetch()[0];

  $select = 'SELECT p1.name AS plant, p2.name AS workshop, p3.name AS region, p4.name AS line, p5.name AS station, p6.name AS channel
             FROM places AS p1
             LEFT OUTER JOIN places AS p2
             ON p1.id = p2.pid
             LEFT OUTER JOIN places AS p3
             ON p2.id = p3.pid
             LEFT OUTER JOIN places AS p4
             ON p3.id = p4.pid
             LEFT OUTER JOIN places AS p5
             ON p4.id = p5.pid
             LEFT OUTER JOIN places AS p6
             ON p5.id = p6.pid
             WHERE p1.pid = 0';
  if ($orderby) {
    $select .= " ORDER BY $orderby";
  }
  $select .= " LIMIT $offset, $rows";
  $sth = $dbh->prepare($select);
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
