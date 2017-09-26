<?php
$isNewRecord = $_POST['isNewRecord'];
$plant = $_POST['plant'];
$workshop = $_POST['workshop'];
$region = $_POST['region'];
$line = $_POST['line'];
$station = $_POST['station'];
$channel = $_POST['channel'];

try {
  $dbh = new PDO('mysql:host=127.0.0.1;dbname=iot0', 'hzw', '123456');

  $select = $dbh->prepare('SELECT id
                           FROM places
                           WHERE name = ?
                           AND pid = ?');
 $insert = $dbh->prepare('INSERT INTO places
                          (name, pid)
                          VALUES
                          (?, ?)');

  // plant
  if (!$plant) {
    die(json_encode(['isError' => true, 'msg' => 'Must give a Plant name!']));
  }
  $pid = 0;
  $select->execute([$plant, $pid]);
  $row = $select->fetch(PDO::FETCH_ASSOC);
  if (!$row) {
    $insert->execute([$plant, $pid]);
    $select->execute([$plant, $pid]);
    $row = $select->fetch(PDO::FETCH_ASSOC);
  }

  // workshop
  if (!$workshop) {
    if ($region || $line || $station || $channel) {
      die(json_encode(['isError' => true, 'msg' => 'Must give a Workshop name!']));
    } else {
      die(json_encode(['isSuccess' => true, 'msg' => 'Success!']));
    }
  }
  $pid = $row['id'];
  $select->execute([$workshop, $pid]);
  $row = $select->fetch(PDO::FETCH_ASSOC);
  if (!$row) {
    $insert->execute([$workshop, $pid]);
    $select->execute([$workshop, $pid]);
    $row = $select->fetch(PDO::FETCH_ASSOC);
  }

  // region
  if (!$region) {
    if ($line || $station || $channel) {
      die(json_encode(['isError' => true, 'msg' => 'Must give a Region name!']));
    } else {
      die(json_encode(['isError' => false]));
    }
  }
  $pid = $row['id'];
  $select->execute([$region, $pid]);
  $row = $select->fetch(PDO::FETCH_ASSOC);
  if (!$row) {
    $insert->execute([$region, $pid]);
    $select->execute([$region, $pid]);
    $row = $select->fetch(PDO::FETCH_ASSOC);
  }

  // line
  if (!$line) {
    if ($station || $channel) {
      die(json_encode(['isError' => true, 'msg' => 'Must give a Line name!']));
    } else {
      die(json_encode(['isError' => false]));
    }
  }
  $pid = $row['id'];
  $select->execute([$line, $pid]);
  $row = $select->fetch(PDO::FETCH_ASSOC);
  if (!$row) {
    $insert->execute([$line, $pid]);
    $select->execute([$line, $pid]);
    $row = $select->fetch(PDO::FETCH_ASSOC);
  }

  // station
  if (!$station) {
    if ($channel) {
      die(json_encode(['isError' => true, 'msg' => 'Must give a Station name!']));
    } else {
      die(json_encode(['isError' => false]));
    }
  }
  $pid = $row['id'];
  $select->execute([$station, $pid]);
  $row = $select->fetch(PDO::FETCH_ASSOC);
  if (!$row) {
    $insert->execute([$station, $pid]);
    $select->execute([$station, $pid]);
    $row = $select->fetch(PDO::FETCH_ASSOC);
  }

  // channel
  if (!$channel) {
    die(json_encode(['isError' => false]));
  }
  $pid = $row['id'];
  $select->execute([$channel, $pid]);
  $row = $select->fetch(PDO::FETCH_ASSOC);
  if (!$row) {
    $insert->execute([$channel, $pid]);
    $select->execute([$channel, $pid]);
    $row = $select->fetch(PDO::FETCH_ASSOC);
  }

  echo json_encode(['isError' => false]);

  $select = null;
  $insert = null;
  $dbh = null;
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}
?>
