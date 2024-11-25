<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login / Registration</title>
<link rel="stylesheet" href="CSS/login.css">
</head>
<body>
    <div class="login-container">
        <h1>Welcome Back!</h1>
        <div class="tabs">
            <button id="loginTab" class="active" onclick="showLogin()">Login</button>
            <button id="registerTab" onclick="showRegister()">Register</button>
        </div>

        <!-- Login Form -->
        <form method="POST" action="loginLogic.php" id="loginForm">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" minlength="8" required>
            <button type="submit">Login</button>
            <p class="toggle-text">Don’t have an account? <span onclick="showRegister()">Register here</span></p>
        </form>

        <!-- Registration Form -->
        <form method="POST" action="registration.php" id="registerForm" style="display: none;">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" minlength="8" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" minlength="8" required>
            <button type="submit">Register</button>
            <p class="toggle-text">Already have an account? <span onclick="showLogin()">Login here</span></p>
        </form>
    </div>

    <script src="JS/login.js"></script>
</body>
</html>