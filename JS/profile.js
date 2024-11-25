function goBack() {
    window.history.back();
}

function editProfile() {
    alert("Redirecting to edit profile...");
    // You can add logic to allow users to edit their profile information.
    // For now, it’s just a placeholder.
    window.location.href = "#editProfile";
}



function contactSupport() {
    alert("Redirecting to contact support...");
    // Add logic to show a contact support form or redirect to support page.
    window.location.href = "#contactSupport";
}

function logout() {
    alert("You have logged out successfully!");
    window.location.href = "welcome.php"; // Redirect to the login page after logout.
}
