<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plan_name = $_POST['plan_name'];
    $plan_duration = $_POST['plan_duration'];
    $plan_schedule = $_POST['plan_schedule'];
    $trainer_name = $_POST['trainer_name'];
    $squats = $_POST['squats'];
    $bench_press = $_POST['bench_press'];
    $cardio = $_POST['cardio'];
    $stretches = $_POST['stretches'];

    // SQL to insert the plan into the database
    $sql = "INSERT INTO workout_plans (plan_name, plan_duration, plan_schedule, trainer_name, squats, bench_press, cardio, stretches)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $plan_name, $plan_duration, $plan_schedule, $trainer_name, $squats, $bench_press, $cardio, $stretches);

    if ($stmt->execute()) {
        echo "New workout plan assigned successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
