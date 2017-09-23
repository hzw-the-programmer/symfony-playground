<?php
$cid = $_POST['id'];

try {
  $dbh = new PDO('mysql:host=127.0.0.1;dbname=iot0', 'hzw', '123456');
  $sth = $dbh->prepare('SELECT * FROM status WHERE cid = ?');
  $sth->execute(array($cid));

  echo json_encode($sth->fetchAll(PDO::FETCH_ASSOC));

  $sth = null;
  $dbh = null;
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}
?>
