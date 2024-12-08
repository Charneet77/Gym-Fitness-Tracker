<?php
session_start();

// Database connection
$serverName = "LAPTOP-D1GO32P7\\SQLEXPRESS";
$connectionOptions = [
    "Database" => "GymWeb",
    "Uid" => "DBTut",
    "PWD" => "Test123"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die("Database connection failed: " . print_r(sqlsrv_errors(), true));
}

$userId = $_SESSION['user_id'];

// Fetch the most recent workout plan for the user
$query = "SELECT TOP 1 plan_name, duration, schedule, trainer_name, squats, bench_press, cardio, stretches 
          FROM WorkoutPlans 
          WHERE user_id = ? 
          ORDER BY id DESC";
$params = [$userId];
$stmt = sqlsrv_query($conn, $query, $params);
$plan = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Workout Plan</title>
<link rel="stylesheet" href="CSS/workout_plan.css">
</head>
<body>
    <div class="workout-plan-container">
        <header>
            <h1>Workout Plans</h1>
            <button class="back-button" onclick="goBack()">Back</button>
        </header>

        <section class="current-plan">
            <h2>Current Plan</h2>
            <?php if ($plan): ?>
                <div class="plan-details">
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($plan['plan_name']); ?></p>
                    <p><strong>Duration:</strong> <?php echo htmlspecialchars($plan['duration']); ?> week(s) </p>
                    <p><strong>Schedule:</strong> <?php echo htmlspecialchars($plan['schedule']); ?></p>
                    <p><strong>Trainer:</strong> <?php echo htmlspecialchars($plan['trainer_name']); ?></p>
                </div>
            <?php else: ?>
                <p>No workout plan assigned yet.</p>
            <?php endif; ?>
        </section>

        <section class="exercise-list">
            <h2>Exercises</h2>
            <?php if ($plan): ?>
                <ul>
                    <li>🏋️‍♀️ Squats: <?php echo htmlspecialchars($plan['squats']); ?></li>
                    <li>💪 Bench Press: <?php echo htmlspecialchars($plan['bench_press']); ?></li>
                    <li>🚴‍♂️ Cardio: <?php echo htmlspecialchars($plan['cardio']); ?> minutes</li>
                    <li>🧘 Stretches: <?php echo htmlspecialchars($plan['stretches']); ?> minutes</li>
                </ul>
            <?php else: ?>
                <p>No exercises assigned yet.</p>
            <?php endif; ?>
        </section>

        <div class="actions">
            <button onclick="viewProgress()">View Progress</button>
            <button onclick="window.location.href='assign_new_plan.php'">Assign New Plan</button>
        </div>
    </div>

    <script src="JS/workout_plan.js"></script>
</body>
</html>
