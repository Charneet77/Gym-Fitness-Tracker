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

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check the connection
if( !$conn ) {
    die( print_r(sqlsrv_errors(), true));
}

$sql = "USE GymWeb;";  // Ensure correct database is selected
sqlsrv_query($conn, $sql);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $query = "INSERT INTO AppUsers (fullname, username, password) VALUES (?, ?, ?)";
    $stmt = sqlsrv_prepare($conn, $query, [$fullname, $email, $hashedPassword]);


    if (sqlsrv_execute($stmt)) {
        echo "Registration successful!";
        header("Location: login.php"); // Redirect to login page
    } else {
        echo "Error: " . print_r(sqlsrv_errors(), true);
    }
}
?>