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
        <!-- Header -->
        <header>
            <h1>Progress Tracking</h1>
            <button class="back-button" onclick="goBack()">Back</button>
        </header>

        <!-- BMI Calculator -->
        <section class="bmi-calculator">
            <h2>BMI Calculator</h2>
            <form id="bmiForm">
                <label for="height">Height (cm):</label>
                <input type="number" id="height" placeholder="Enter your height in cm" required>

                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" placeholder="Enter your weight in kg" required>

                <button type="submit">Calculate BMI</button>
            </form>
            <div id="bmiResult" class="bmi-result"></div>
        </section>

        <!-- Progress History -->
        <section class="progress-history">
            <h2>Progress History</h2>
            <ul>
                <li>
                    <p><strong>Date:</strong> 2024-11-10</p>
                    <p><strong>Weight:</strong> 70 kg | <strong>Body Fat:</strong> 18% | <strong>Muscle Mass:</strong> 30 kg</p>
                </li>
                <li>
                    <p><strong>Date:</strong> 2024-10-10</p>
                    <p><strong>Weight:</strong> 72 kg | <strong>Body Fat:</strong> 19% | <strong>Muscle Mass:</strong> 28 kg</p>
                </li>
                <!-- More progress entries can be added here -->
            </ul>
        </section>
    </div>

    <script src="JS/progress_tracking.js"></script>
</body>
</html>
