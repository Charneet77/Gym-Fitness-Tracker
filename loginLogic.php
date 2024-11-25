<?php
session_start();

// Database connection parameters
$serverName = "localhost"; // Replace with your server name
$connectionOptions = array(
    "Database" => "GymWeb", // Replace with your database name
    "Uid" => "DBTut", // Replace with your username
    "PWD" => "Test123"  // Replace with your password
);

// Establishes the connection
$conn = sqlsrv_connect( $serverName, $connectionOptions );

// Check connection
if( !$conn ) {
    die( print_r(sqlsrv_errors(), true));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data from the database
    $query = "SELECT username, password FROM AppUsers WHERE username = ?";
    $stmt = sqlsrv_prepare($conn, $query, [$email]);
    sqlsrv_execute($stmt);

    $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $user['username'];

        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>
