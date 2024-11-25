<?php
session_start();

// Database connection
$serverName = "LAPTOP-D1GO32P7\SQLEXPRESS";  // Replace with your server details
$connectionOptions = [
    "Database" => "GymWeb",
    "Uid" => "DBTut",
    "PWD" => "Test123"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data from the database
    $query = "SELECT fullname, password FROM AppUsers WHERE username = ?";
    $stmt = sqlsrv_prepare($conn, $query, [$email]);
    if (sqlsrv_execute($stmt)) {
        $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Store the user's full name and email in the session
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $email;

            // Redirect to the dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Error executing query.";
    }
}
?>