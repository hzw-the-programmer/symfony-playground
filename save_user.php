<?php
include "connection.php";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$sql = "INSERT INTO users (firstname, lastname, phone, email) VALUES (?, ?, ?, ?)";
$stmt = sqlsrv_prepare($conn, $sql, [&$firstname, &$lastname, &$phone, &$email]);
if ($stmt === false) {
  $results["errorMsg"] = "error at prepare!"; // print_r(sqlsrv_errors(), true);
  die(json_encode($results));
}
if (sqlsrv_execute($stmt) === false) {
  $results["errorMsg"] = "error at execute!"; // print_r(sqlsrv_errors(), true);
  die(json_encode($results));
}
sqlsrv_free_stmt($stmt);

$results["errorMsg"] = null;
echo json_encode($results);

sqlsrv_close($conn);
