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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trainerName = $_POST['trainer'];  // Get trainer from dropdown
    $appointmentTime = $_POST['appointment-time'];  // Get the selected date/time

    // Check if all fields are filled
    if (empty($trainerName) || empty($appointmentTime)) {
        echo "All fields are required.";
        exit();
    }

    // Get the trainer_id from the Trainers table
    $query = "SELECT TOP 1 trainer_id FROM Trainers WHERE name = ?";
    $stmt = sqlsrv_prepare($conn, $query, [$trainerName]);

    if (sqlsrv_execute($stmt)) {
        $trainer = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        if ($trainer) {
            $trainerId = $trainer['trainer_id'];  // Get the trainer_id from the query result

            // Insert the appointment into the Appointments table
            $query = "INSERT INTO Appointments (user_id, trainer_id, appointment_time, status) 
                      VALUES (?, ?, ?, 'Scheduled')";
            $params = [$_SESSION['user_id'], $trainerId, $appointmentTime];
            $stmt = sqlsrv_prepare($conn, $query, $params);

            if (sqlsrv_execute($stmt)) {
                echo "Appointment booked successfully!";
                header("Location: workout_plan.php");
                exit();
            } else {
                echo "Error booking appointment: " . print_r(sqlsrv_errors(), true);
            }
        } else {
            echo "Trainer not found.";
        }
    } else {
        echo "Error: " . print_r(sqlsrv_errors(), true);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="CSS/schedule_appointments.css">
</head>
<body>
    <div class="schedule-container">
        <header>
            <h1>Schedule & Appointments</h1>
            <button class="back-button" onclick="window.location.href='workout_plan.php'">Back</button>
        </header>

        <!-- Book Appointment -->
        <section class="book-appointment">
            <h2>Book an Appointment</h2>
            <form method="POST" action="book_appointment.php">
                <label for="trainer">Select Trainer:</label>
                <select id="trainer" name="trainer" required>
                    <option value="">--Choose Trainer--</option>
                    <option value="John">John - Strength Trainer</option>
                    <option value="Sarah">Sarah - Yoga Specialist</option>
                    <option value="Emily">Emily - HIIT Coach</option>
                </select>

                <label for="appointment-time">Choose Time:</label>
                <input type="datetime-local" id="appointment-time" name="appointment-time" required>

                <button type="submit">Book Appointment</button>
            </form>
        </section>
    </div>
</body>
</html>
