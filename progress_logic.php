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
    $user_id = $_SESSION['user_id'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    // Calculate BMI
    $height_m = $height / 100;
    $bmi = $weight / ($height_m * $height_m);

    // Insert progress data into the database
    $query = "INSERT INTO ProgressTracker (user_id, height_cm, weight_kg, bmi, date_tracked) VALUES (?, ?, ?, ?, GETDATE())";
    $params = [$user_id, $height, $weight, $bmi];
    $stmt = sqlsrv_prepare($conn, $query, $params);

    if (sqlsrv_execute($stmt)) {
        header("Location: progress_tracking.php");
        exit();
    } else {
        echo "Error: " . print_r(sqlsrv_errors(), true);
    }
}
?>
