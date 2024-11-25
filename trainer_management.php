<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Trainer Management</title>
<link rel="stylesheet" href="CSS/trainer_management.css">
</head>
<body>
    <div class="trainer-management-container">
        <!-- Header -->
        <header>
            <h1>Trainer Management</h1>
            <button class="back-button" onclick="goBack()">Back</button>
        </header>

        <!-- Trainer List -->
        <section class="trainer-list">
            <h2>Trainers</h2>
            <ul>
                <li>
                    <div class="trainer-card">
                        <p><strong>Name:</strong> John Doe</p>
                        <p><strong>Assigned Members:</strong> 15</p>
                        <button onclick="viewDetails('John Doe')">View Details</button>
                    </div>
                </li>
                <li>
                    <div class="trainer-card">
                        <p><strong>Name:</strong> Jane Smith</p>
                        <p><strong>Assigned Members:</strong> 10</p>
                        <button onclick="viewDetails('Jane Smith')">View Details</button>
                    </div>
                </li>
                <!-- Add more trainer cards here -->
            </ul>
        </section>

        <!-- Add Trainer -->
        <section class="add-trainer">
            <h2>Add Trainer</h2>
            <form id="addTrainerForm">
                <input type="text" placeholder="Trainer Name" required>
                <input type="text" placeholder="Specialization" required>
                <button type="submit">Add Trainer</button>
            </form>
        </section>
    </div>

    <script src="JS/trainer_management.js"></script>
</body>
</html>
