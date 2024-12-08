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
    // Getting form data
    $planName = $_POST['plan_name'];
    $duration = $_POST['duration'];
    $schedule = $_POST['schedule'];
    $trainerName = $_POST['trainer_name'];
    $squats = $_POST['squats'];
    $benchPress = $_POST['bench_press'];
    $cardio = $_POST['cardio'];
    $stretches = $_POST['stretches'];
    $userId = $_SESSION['user_id']; // Ensure user_id is set in the session

    // Prepare the query to insert the workout plan
    $query = "INSERT INTO WorkoutPlans (user_id, plan_name, duration, schedule, trainer_name, squats, bench_press, cardio, stretches) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $params = [$userId, $planName, $duration, $schedule, $trainerName, $squats, $benchPress, $cardio, $stretches];

    // Prepare and execute the statement
    $stmt = sqlsrv_prepare($conn, $query, $params);

    if (sqlsrv_execute($stmt)) {
        // Redirect back to workout_plan.php after successful insertion
        header("Location: workout_plan.php");
        exit();
    } else {
        echo "Error: " . print_r(sqlsrv_errors(), true);  // Display errors if the query fails
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign New Plan</title>
    <link rel="stylesheet" href="CSS/workout_plan.css">
</head>
<body>
    <div class="workout-plan-container">
        <header>
            <h1>Assign New Workout Plan</h1>
            <button class="back-button" onclick="window.location.href='workout_plan.php'">Back</button>
        </header>

        <!-- Workout Plan Form -->
        <form method="POST" action="assign_new_plan.php">
            <label for="plan_name">Plan Name:</label>
            <input type="text" id="plan_name" name="plan_name" required>

            <label for="duration">Duration: (in weeks)</label>
            <input type="text" id="duration" name="duration" required>

            <label for="schedule">Schedule:</label>
            <input type="text" id="schedule" name="schedule" required>

            <label for="trainer_name">Trainer Name:</label>
            <input type="text" id="trainer_name" name="trainer_name" required>

            <label for="squats">Squats (sets x reps):</label>
            <input type="text" id="squats" name="squats" required>

            <label for="bench_press">Bench Press (sets x reps):</label>
            <input type="text" id="bench_press" name="bench_press" required>

            <label for="cardio">Cardio (minutes):</label>
            <input type="text" id="cardio" name="cardio" required>

            <label for="stretches">Stretches (minutes):</label>
            <input type="text" id="stretches" name="stretches" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
