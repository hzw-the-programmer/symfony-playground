<?php
$cid = $_POST['id'];
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

  $select = 'SELECT COUNT(*) FROM status';
  $params = [];
  if ($cid) {
    $select .= ' WHERE cid = ?';
    array_push($params, $cid);
  }
  $sth = $dbh->prepare($select);
  $sth->execute($params);
  $result['total'] = $sth->fetch()[0];

  $select = 'SELECT * FROM status';
  $params = [];
  if ($cid) {
    $select .= ' WHERE cid = ?';
    array_push($params, $cid);
  }
  if ($orderby) {
    $select .= " ORDER BY $orderby";
  }
  $select .= " LIMIT $offset, $rows";
  $sth = $dbh->prepare($select);
  $sth->execute($params);
  $result['rows'] = $sth->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);

  $sth = null;
  $dbh = null;
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}
?>
