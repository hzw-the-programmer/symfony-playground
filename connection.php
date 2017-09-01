<?php
$serverName = "127.0.0.1";
$connectionInfo = ["UID" => "sa", "PWD" => "kaifa@123", "Database" => "master"];
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
  die(print_r(sqlsrv_errors(), true));
}

$db = "test";
$sql = "SELECT DB_ID(?)";
$params = [$db];
$stmt = sqlsrv_query($conn, $sql, $params);
if ($stmt === false) {
  die(print_r(sqlsrv_errors(), true));
}
$row = sqlsrv_fetch_array($stmt);
sqlsrv_free_stmt($stmt);
if (!$row[0]) {
  $sql = "CREATE DATABASE $db
  ON (
    NAME = {$db}_dat,
    FILENAME = 'E:\\db\\{$db}dat.mdf',
    SIZE = 10,
    MAXSIZE = 50,
    FILEGROWTH = 5
  )
  LOG ON (
    NAME = {$db}_log,
    FILENAME = 'E:\\db\\{$db}log.ldf',
    SIZE = 5MB,
    MAXSIZE = 25MB,
    FILEGROWTH = 5MB
  )";
  $stmt = sqlsrv_query($conn, $sql);
  if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
  }
  sqlsrv_free_stmt($stmt);
}

sqlsrv_close($conn);

$connectionInfo["Database"] = $db;
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
  die(print_r(sqlsrv_errors(), true));
}

$table = "users";
$sql = "SELECT OBJECT_ID(?)";
$params = [$table];
$stmt = sqlsrv_query($conn, $sql, $params);
if ($stmt === false) {
  die(print_r(sqlsrv_errors(), true));
}
$row = sqlsrv_fetch_array($stmt);
sqlsrv_free_stmt($stmt);
if (!$row[0]) {
  $sql = "CREATE TABLE $table (
    id int NOT NULL IDENTITY CONSTRAINT {$table}_pk PRIMARY KEY,
    firstname nvarchar(20) NOT NULL,
    lastname nvarchar(20) NOT NULL,
    phone nvarchar(20) NULL,
    email nvarchar(50) NULL,
    joined datetime NULL DEFAULT(GETDATE())
  )";
  $stmt = sqlsrv_query($conn, $sql);
  if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
  }
  sqlsrv_free_stmt($stmt);

  $sql = "INSERT INTO $table (firstname, lastname) VALUES ('Jon' + CONVERT(NVARCHAR, ISNULL(@@IDENTITY, 0)), 'Snow' + CONVERT(NVARCHAR, ISNULL(@@IDENTITY, 0)))";
  $stmt = sqlsrv_prepare($conn, $sql);
  if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
  }
  for ($i = 0; $i < 21; $i++) {
    if (sqlsrv_execute($stmt) === false) {
      die(print_r(sqlsrv_errors(), true));
    }
  }
  sqlsrv_free_stmt($stmt);
}

// sqlsrv_close($conn);
