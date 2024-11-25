<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>
<link rel="stylesheet" href="CSS/profile.css">
</head>
<body>
    <div class="profile-container">
        <!-- Header -->
        <header>
            <h1>Your Profile</h1>
            <button class="back-button" onclick="goBack()">Back</button>
        </header>

        <!-- Profile Information -->
        <section class="profile-info">
            <h2>Personal Information</h2>
            <p><strong>Name:</strong> Ahmed Waleed Arman</p>
            <p><strong>Email:</strong> ahmed@example.com</p>
            <p><strong>Phone:</strong> (123) 456-7890</p>
            <p><strong>Subscription Plan:</strong> Premium</p>
            <button onclick="editProfile()">Edit Profile</button>
        </section>

        <!-- Subscription Details -->
        <section class="subscription-details">
            <h2>Subscription Details</h2>
            <p><strong>Start Date:</strong> 2024-01-01</p>
            <p><strong>Next Payment:</strong> 2024-12-01</p>
            <p><strong>Status:</strong> Active</p>
            
        </section>

        <!-- Contact Support -->
        <section class="contact-support">
            <h2>Need Help?</h2>
            <button onclick="contactSupport()">Contact Support</button>
        </section>

        <!-- Logout -->
        <section class="logout">
            <button class="logout-button" onclick="logout()">Log Out</button>
        </section>
    </div>

    <script src="JS/profile.js"></script>
</body>
</html>
