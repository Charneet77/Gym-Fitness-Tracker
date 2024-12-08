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

// Fetch trainers for the dropdown
$trainerQuery = "SELECT id, name, specialty FROM Trainers";
$trainerStmt = sqlsrv_query($conn, $trainerQuery);

if (!$trainerStmt) {
    die("Error fetching trainers: " . print_r(sqlsrv_errors(), true));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Schedule and Appointments</title>
<link rel="stylesheet" href="CSS/schedule_appointments.css">
</head>
<body>
    <div class="schedule-container">
        <!-- Header -->
        <header>
            <h1>Schedule & Appointments</h1>
            <button class="back-button" onclick="window.history.back()">Back</button>
        </header>

        <!-- Book Appointment -->
        <section class="book-appointment">
            <h2>Book an Appointment</h2>
            <form method="POST" action="book_appointment.php">
                <label for="trainer">Select Trainer:</label>
                <select id="trainer" name="trainer_id" required>
                    <option value="">--Choose Trainer--</option>
                    <?php while ($row = sqlsrv_fetch_array($trainerStmt, SQLSRV_FETCH_ASSOC)): ?>
                        <option value="<?php echo $row['id']; ?>">
                            <?php echo htmlspecialchars($row['name'] . ' - ' . $row['specialty']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <label for="appointment-time">Choose Time:</label>
                <input type="datetime-local" id="appointment-time" name="appointment_time" required>

                <button type="submit">Book Appointment</button>
            </form>
        </section>
    </div>
</body>
</html>
