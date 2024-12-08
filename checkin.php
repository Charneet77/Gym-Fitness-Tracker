<?php
session_start();

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

// Get user_id from URL
if (!isset($_GET['user_id'])) {
    die("Invalid request.");
}

$userId = $_GET['user_id'];

// Insert attendance record for the current date
$query = "INSERT INTO Attendance (user_id, attendance_date) VALUES (?, GETDATE())";
$params = [$userId];

$stmt = sqlsrv_query($conn, $query, $params);

if ($stmt) {
    echo "Attendance recorded successfully!";
} else {
    echo "Error: " . print_r(sqlsrv_errors(), true);
}
?>
