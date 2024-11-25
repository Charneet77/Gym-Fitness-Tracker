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
        <!-- Header -->
        <header>
            <h1>Workout Plans</h1>
            <button class="back-button" onclick="goBack()">Back</button>
        </header>

        <!-- Active Workout Plan -->
        <section class="current-plan">
            <h2>Current Plan</h2>
            <div class="plan-details">
                <p><strong>Name:</strong> Full-Body Strength</p>
                <p><strong>Duration:</strong> 4 Weeks</p>
                <p><strong>Schedule:</strong> Mon, Wed, Fri</p>
                <p><strong>Trainer:</strong> John Doe</p>
            </div>
        </section>

        <!-- Exercise List -->
        <section class="exercise-list">
            <h2>Exercises</h2>
            <ul>
                <li>🏋️‍♀️ Squats: 3 sets of 12 reps</li>
                <li>💪 Bench Press: 3 sets of 10 reps</li>
                <li>🚴‍♂️ Cardio: 20 minutes</li>
                <li>🧘 Stretches: 10 minutes</li>
            </ul>
        </section>

        <!-- Action Buttons -->
        <div class="actions">
            <button onclick="viewProgress()">View Progress</button>
            <button onclick="assignNewPlan()">Assign New Plan</button>
        </div>
    </div>

    <script src="JS/workout_plan.js"></script>
</body>
</html>
