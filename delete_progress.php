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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $progress_id = $_POST['progress_id'];

    // Delete the entry
    $query = "DELETE FROM ProgressTracker WHERE progress_id = ?";
    $params = [$progress_id];
    $stmt = sqlsrv_prepare($conn, $query, $params);

    if (sqlsrv_execute($stmt)) {
        header("Location: progress_tracking.php");
        exit();
    } else {
        echo "Error deleting progress: " . print_r(sqlsrv_errors(), true);
    }
}
?>
