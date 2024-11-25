<?php
$serverName = "LAPTOP-D1GO32P7\SQLEXPRESS";  // Your SQL Server instance
$database = "GymWeb";  // Database name
$uid = "DBTut";  // SQL Server login username
$pass = "Test123";  // SQL Server login password

$connectionOptions = [
    "Database" => $database,
    "Uid" => $uid,
    "PWD" => $pass
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));  // Print errors if connection fails
} else {
    echo "Connection established successfully.";
}
?>
