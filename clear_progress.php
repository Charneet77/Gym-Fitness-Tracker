<?php
session_start();

// Database connection
$serverName = "LAPTOP-D1GO32P7\SQLEXPRESS";
$connectionOptions = [
    "Database" => "GymWeb",
    "Uid" => "DBTut",
    "PWD" => "Test123"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die("Database connection failed: " . print_r(sqlsrv_errors(), true));
}

$user_id = $_SESSION['user_id'];

// Delete all progress entries for the user
$query = "DELETE FROM ProgressTracker WHERE user_id = ?";
$params = [$user_id];
$stmt = sqlsrv_prepare($conn, $query, $params);

if (sqlsrv_execute($stmt)) {
    header("Location: progress_tracking.php");
    exit();
} else {
    echo "Error clearing progress: " . print_r(sqlsrv_errors(), true);
}
?>
