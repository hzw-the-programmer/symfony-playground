<?php
$page = $_POST['page'];
$rows = $_POST['rows'];
$offset = ($page - 1) * $rows;

try {
  $results = [];
  $dbh = new PDO('mysql:host=127.0.0.1;dbname=iot0', 'hzw', '123456');
  $sth = $dbh->prepare('SELECT COUNT(*) FROM device');
  $sth->execute();
  $results['total'] = $sth->fetch()[0];
  // $sth = $dbh->prepare('SELECT * FROM device LIMIT ?, ?');
  // $sth->execute(array($offset, $rows));
  $sth = $dbh->prepare("SELECT * FROM device LIMIT $offset, $rows");
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
