<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate form data
    if (empty($email) || empty($newPassword) || empty($confirmPassword)) {
        echo "All fields are required.";
        exit;
    }
    if ($newPassword !== $confirmPassword) {
        echo "New password and confirm password do not match.";
        exit;
    }

    echo "Password reset successfully!";
} else {
    // If the form is not submitted via POST method, redirect back to the reset password page
    header("Location: resetpage.html");
    exit;
}
?>
