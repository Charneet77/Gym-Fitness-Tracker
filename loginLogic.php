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
    die("Database connection failed: " . print_r(sqlsrv_errors(), true));
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];      // Get email from the form
    $password = $_POST['password']; // Get password from the form

    // Query to fetch user details
    $query = "SELECT id, fullname, password FROM AppUsers WHERE username = ?";
    $stmt = sqlsrv_prepare($conn, $query, [$email]);

    if ($stmt && sqlsrv_execute($stmt)) {
        $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        // Verify user credentials
        if ($user && password_verify($password, $user['password'])) {
            // Store user information in the session
            $_SESSION['user_id'] = $user['id'];          // Store user ID
            $_SESSION['fullname'] = $user['fullname'];  // Store full name
            $_SESSION['email'] = $email;               // Store email

            // Redirect to the dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<p>Invalid email or password.</p>";
        }
    } else {
        echo "<p>Error executing query: " . print_r(sqlsrv_errors(), true) . "</p>";
    }
}
?>
