<?php
$id = $_POST['id'];

try {
  $dbh = new PDO('mysql:host=127.0.0.1;dbname=iot0', 'hzw', '123456');
  $sth = $dbh->prepare('DELETE FROM places WHERE id = ?');
  $sth->execute([$id]);

  echo json_encode(['isError' => false, 'msg' => "Place $id deleted successfully."]);

  $sth = null;
  $dbh = null;
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}
?>
