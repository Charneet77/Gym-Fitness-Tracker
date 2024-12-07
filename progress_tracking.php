<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$serverName = "LAPTOP-D1GO32P7\SQLEXPRESS";
$connectionOptions = [
    "Database" => "GymWeb",
    "Uid" => "DBTut",
    "PWD" => "Test123"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch progress history for the logged-in user
$query = "SELECT progress_id, date_tracked, height_cm, weight_kg, bmi FROM ProgressTracker WHERE user_id = ? ORDER BY date_tracked DESC";
$params = [$_SESSION['user_id']];
$stmt = sqlsrv_query($conn, $query, $params);

if (!$stmt) {
    die("Error fetching progress history: " . print_r(sqlsrv_errors(), true));
}

// Function to determine BMI category
function getBMICategory($bmi) {
    if ($bmi < 18.5) return "Underweight";
    if ($bmi >= 18.5 && $bmi < 24.9) return "Normal weight";
    if ($bmi >= 25 && $bmi < 29.9) return "Overweight";
    return "Obese";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Progress Tracking</title>
<link rel="stylesheet" href="CSS/progress_tracking.css">
</head>
<body>
    <div class="progress-tracking-container">
        <header>
            <h1>Progress Tracking</h1>
            <button class="back-button" onclick="window.history.back();">Back</button>
            <form method="POST" action="clear_progress.php" style="display:inline;">
                <button type="submit" class="clear-button">Clear All Progress</button>
            </form>
        </header>

        <!-- BMI Calculator -->
        <section class="bmi-calculator">
            <h2>BMI Calculator</h2>
            <form method="POST" action="progress_logic.php">
                <label for="height">Height (cm):</label>
                <input type="number" id="height" name="height" placeholder="Enter your height in cm" required>
                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" name="weight" placeholder="Enter your weight in kg" required>
                <button type="submit">Calculate and Save BMI</button>
            </form>
        </section>

        <!-- Progress History -->
        <section class="progress-history">
            <h2>Progress History</h2>
            <ul>
                <?php
                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                    $bmiCategory = getBMICategory($row['bmi']);
                    echo "<li>";
                    echo "<p><strong>Date:</strong> " . $row['date_tracked']->format('Y-m-d') . "</p>";
                    echo "<p><strong>Height:</strong> " . $row['height_cm'] . " cm | <strong>Weight:</strong> " . $row['weight_kg'] . " kg | <strong>BMI:</strong> " . $row['bmi'] . " (<em>$bmiCategory</em>)</p>";

                    // Delete Button
                    echo "<form method='POST' action='delete_progress.php' style='display:inline;'>";
                    echo "<input type='hidden' name='progress_id' value='{$row['progress_id']}'>";
                    echo "<button type='submit' class='delete-button'>Delete</button>";
                    echo "</form>";

                    echo "</li>";
                }
                ?>
            </ul>
        </section>
    </div>
</body>
</html>
