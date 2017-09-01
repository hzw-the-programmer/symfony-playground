<?php
include 'connection.php';

$page = $_POST["page"];
$rows = $_POST["rows"];

$sql = "SELECT COUNT(*) FROM users";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
  die(print_r(sqlsrv_errors(), true));
}
$row = sqlsrv_fetch_array($stmt);
$results["total"] = $row[0];
sqlsrv_free_stmt($stmt);

$sql = "SELECT * FROM users ORDER BY id OFFSET ($page - 1) * $rows ROWS FETCH NEXT $rows ROWS ONLY";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
  die(print_r(sqlsrv_errors(), true));
}
$results["rows"] = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
  array_push($results["rows"], $row);
}
sqlsrv_free_stmt($stmt);

echo json_encode($results);

sqlsrv_close($conn);
