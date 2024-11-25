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
            <button class="back-button" onclick="goBack()">Back</button>
        </header>

        <!-- Class Schedule -->
        <section class="class-schedule">
            <h2>Class Schedule</h2>
            <table>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Class</th>
                        <th>Trainer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Monday</td>
                        <td>6:00 PM</td>
                        <td>Yoga</td>
                        <td>Sarah</td>
                    </tr>
                    <tr>
                        <td>Wednesday</td>
                        <td>6:00 PM</td>
                        <td>Strength Training</td>
                        <td>John</td>
                    </tr>
                    <tr>
                        <td>Friday</td>
                        <td>7:00 PM</td>
                        <td>HIIT</td>
                        <td>Emily</td>
                    </tr>
                    <!-- More classes can be added here -->
                </tbody>
            </table>
        </section>

        <!-- Book Appointment -->
        <section class="book-appointment">
            <h2>Book an Appointment</h2>
            <form id="appointmentForm">
                <label for="trainer">Select Trainer:</label>
                <select id="trainer" required>
                    <option value="">--Choose Trainer--</option>
                    <option value="John">John - Strength Trainer</option>
                    <option value="Sarah">Sarah - Yoga Specialist</option>
                    <option value="Emily">Emily - HIIT Coach</option>
                </select>

                <label for="appointment-time">Choose Time:</label>
                <input type="datetime-local" id="appointment-time" required>

                <button type="submit">Book Appointment</button>
            </form>
        </section>

        <!-- Upcoming Appointments -->
        <section class="upcoming-appointments">
            <h2>Your Upcoming Appointments</h2>
            <ul>
                <li>
                    <p><strong>Trainer:</strong> John - Strength Training</p>
                    <p><strong>Date & Time:</strong> 2024-11-23 6:00 PM</p>
                    <button class="cancel-btn" onclick="cancelAppointment()">Cancel</button>
                </li>
                <li>
                    <p><strong>Trainer:</strong> Emily - HIIT</p>
                    <p><strong>Date & Time:</strong> 2024-11-25 7:00 PM</p>
                    <button class="cancel-btn" onclick="cancelAppointment()">Cancel</button>
                </li>
                <!-- More upcoming appointments can be listed here -->
            </ul>
        </section>
    </div>

    <script src="JS/schedule_appointments.js"></script>
</body>
</html>
