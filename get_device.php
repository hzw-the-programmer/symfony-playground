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
  $results = [];
  $dbh = new PDO('mysql:host=127.0.0.1;dbname=iot0', 'hzw', '123456');
  $sth = $dbh->prepare('SELECT COUNT(*) FROM device');
  $sth->execute();
  $results['total'] = $sth->fetch()[0];
  // $sth = $dbh->prepare('SELECT * FROM device LIMIT ?, ?');
  // $sth->execute(array($offset, $rows));
  $select = 'SELECT * FROM device';
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
