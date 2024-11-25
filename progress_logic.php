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

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id']; // Logged-in user's ID
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    // Validate input
    if (empty($height) || empty($weight)) {
        die("Height and weight are required.");
    }

    // Calculate BMI
    $height_m = $height / 100; // Convert height to meters
    $bmi = $weight / ($height_m * $height_m);

    // Insert progress data
    $query = "INSERT INTO ProgressTracker (user_id, height_cm, weight_kg, bmi, date_tracked) VALUES (?, ?, ?, ?, GETDATE())";
    $params = [$user_id, $height, $weight, $bmi];
    $stmt = sqlsrv_prepare($conn, $query, $params);

    if (!$stmt) {
        die("SQL preparation error: " . print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_execute($stmt)) {
        header("Location: progress_tracking.php");
        exit();
    } else {
        die("SQL execution error: " . print_r(sqlsrv_errors(), true));
    }
}
?>
