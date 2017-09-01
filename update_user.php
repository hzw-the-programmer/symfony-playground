<?php
include "connection.php";

$id = $_GET["id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$sql = "UPDATE users SET firstname = ?, lastname = ?, phone = ?, email = ? WHERE id = ?";
$stmt = sqlsrv_prepare($conn, $sql, [&$firstname, &$lastname, &$phone, &$email, &$id]);
if ($stmt === false) {
  $results["errorMsg"] = "error at prepare!";
  die(json_encode($results));
}
if (sqlsrv_execute($stmt) === false) {
  $result["errorMsg"] = "error at execute!";
  die(json_encode($results));
}
sqlsrv_free_stmt($stmt);

$results["errorMsg"] = null;
echo json_encode($results);

sqlsrv_close($conn);
