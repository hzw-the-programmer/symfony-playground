<?php
include "connection.php";

$id = $_POST["id"];

$sql = "DELETE FROM users WHERE id = ?";
$stmt = sqlsrv_prepare($conn, $sql, [&$id]);
if ($stmt === false) {
  $results["success"] = false;
  $results["errorMsg"] = "error at prepare!";
  die(json_encode($results));
}
if (sqlsrv_execute($stmt) === false) {
  $results["success"] = false;
  $results["errorMsg"] = "error at execute!";
  die(json_encode($results));
}
sqlsrv_free_stmt($stmt);

$results["success"] = true;
$results["errorMsg"] = null;
echo json_encode($results);

sqlsrv_close($conn);
