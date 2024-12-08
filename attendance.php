<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Tracking</title>
    <link rel="stylesheet" href="CSS/attendance.css">
</head>
<body>
    <div class="attendance-container">
        <!-- Header -->
        <header>
            <h1>Attendance Tracking</h1>
            <button class="back-button" onclick="window.history.back();">Back</button>
        </header>

        <!-- QR Check-In -->
        <section class="qr-checkin">
            <h2>Check-In via QR Code</h2>
            <div class="qr-code">
                <img src="generate_qr.php" alt="QR Code">
            </div>
            <p>Scan the code above to check-in.</p>
        </section>


        <!-- Attendance Stats -->
        <section class="attendance-stats">
            <h2>Your Attendance</h2>
            <div class="stats">
                <p><strong>Total Check-Ins:</strong> 42</p>
                <p><strong>Attendance This Month:</strong> 85%</p>
                <p><strong>Last Check-In:</strong> 2024-11-17</p>
            </div>
        </section>

        <!-- Manual Check-In -->
        <section class="manual-checkin">
            <h2>Manual Check-In</h2>
            <form method="POST" action="manual_checkin.php">
                <button type="submit">Check-In Now</button>
            </form>
        </section>
    </div>
</body>
</html>
