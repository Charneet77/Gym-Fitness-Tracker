<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Database connection
$serverName = "LAPTOP-D1GO32P7\\SQLEXPRESS";
$connectionOptions = [
    "Database" => "GymWeb",
    "Uid" => "DBTut",
    "PWD" => "Test123"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die("Database connection failed: " . print_r(sqlsrv_errors(), true));
}

$query = "INSERT INTO Attendance (user_id, check_in_date) VALUES (?, GETDATE())";
$params = [$userId];
$stmt = sqlsrv_query($conn, $query, $params);

if ($stmt) {
    echo "Manual check-in successful!";
} else {
    echo "Manual check-in failed: " . print_r(sqlsrv_errors(), true);
}

header("Location: attendance.php");
exit();
?>
