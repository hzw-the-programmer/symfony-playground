<?php
$did = $_POST['id'];
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
  $orderby = "$sort $order";
}

try {
  $dbh = new PDO('mysql:host=127.0.0.1;dbname=iot0', 'hzw', '123456');
  $select = 'SELECT COUNT(*) FROM channel';
  $params = [];
  if ($did) {
    $select .= ' WHERE did = ?';
    array_push($params, $did);
  }
  $sth = $dbh->prepare($select);
  $sth->execute($params);
  $result['total'] = $sth->fetch()[0];

  $select = 'SELECT * FROM channel';
  $params = [];
  if ($did) {
    $select .= ' WHERE did = ?';
    array_push($params, $did);
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
