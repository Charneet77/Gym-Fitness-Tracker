<?php
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

// Query to fetch all rows from the ProgressTracker table
$query = "SELECT * FROM ProgressTracker";
$stmt = sqlsrv_query($conn, $query);

if (!$stmt) {
    die("Error fetching data: " . print_r(sqlsrv_errors(), true));
}

echo "<h1>ProgressTracker Table</h1>";
echo "<table border='1'>
        <tr>
            <th>Progress ID</th>
            <th>User ID</th>
            <th>Height (cm)</th>
            <th>Weight (kg)</th>
            <th>BMI</th>
            <th>Date Tracked</th>
        </tr>";

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['progress_id']}</td>
            <td>{$row['user_id']}</td>
            <td>{$row['height_cm']}</td>
            <td>{$row['weight_kg']}</td>
            <td>{$row['bmi']}</td>
            <td>{$row['date_tracked']->format('Y-m-d')}</td>
          </tr>";
}

echo "</table>";
?>
