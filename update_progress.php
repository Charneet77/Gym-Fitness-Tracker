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
    $new_height = $_POST['new_height'];
    $new_weight = $_POST['new_weight'];

    // Calculate new BMI
    $height_m = $new_height / 100;
    $new_bmi = $new_weight / ($height_m * $height_m);

    // Update the progress entry
    $query = "UPDATE ProgressTracker SET height_cm = ?, weight_kg = ?, bmi = ?, is_updated = 1 WHERE progress_id = ?";
    $params = [$new_height, $new_weight, $new_bmi, $progress_id];
    $stmt = sqlsrv_prepare($conn, $query, $params);

    if (sqlsrv_execute($stmt)) {
        header("Location: progress_tracking.php");
        exit();
    } else {
        echo "Error updating progress: " . print_r(sqlsrv_errors(), true);
    }
}
?>
