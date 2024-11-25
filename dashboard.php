<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Fetch the user's name from the session or database
$fullname = $_SESSION['fullname']; // Assuming 'username' was set during login
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gym Management Dashboard</title>
<link rel="stylesheet" href="CSS/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Header Section -->
        <header>
            <h1>Gym Management System</h1>
            <button class="logout-button" onclick="location.href='logout.php'">Logout</button>
        </header>

        <!-- User Greeting -->
        <div class="welcome-message">
            <h2>Welcome, <?php echo htmlspecialchars($fullname); ?>!</h2>
            <p>Here’s an overview of your fitness journey.</p>
        </div>

        <!-- Quick Stats Section -->
        <div class="stats-container">
            <div class="stat-card">
                <h3>Next Workout</h3>
                <p>Leg Day - 6:00 PM</p>
            </div>
            <div class="stat-card">
                <h3>Total Workouts</h3>
                <p>45 Sessions</p>
            </div>
            <div class="stat-card">
                <h3>Attendance</h3>
                <p>85% This Month</p>
            </div>
        </div>

        <!-- Navigation Section -->
        <div class="nav-buttons">
            <button onclick="location.href='workout_plan.php'">Workout Plans</button>
            <button onclick="location.href='attendance.php'">Attendance</button>
            <button onclick="location.href='progress_tracking.php'">Progress Tracking</button>
            <button onclick="location.href='schedule_appointments.php'">Appointments</button>
            <button onclick="location.href='reports.php'">Reports</button>
        </div>
    </div>

    <script src="JS/dashboard.js"></script>
</body>
</html>
