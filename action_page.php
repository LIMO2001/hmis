<?php 
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'batalion';

// Establish a connection to the database
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Error connecting to the database: " . mysqli_connect_error());
}

// Function to sanitize user input
function sanitizeInput($conn, $data) {
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted for login
    if(isset($_POST['login'])) {
        // Retrieve email and password from the form
        $email = sanitizeInput($conn, $_POST['email']);
        $password = sanitizeInput($conn, $_POST['psw']);

        // Prepare a SQL query to find a matching record in the database
        $sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
        
        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Login successful
            echo "Login successful";
        } else {
            // Login failed
            echo "Invalid email or password";
        }

        // Free the result set
        mysqli_free_result($result);
    }

    // Check if the form is submitted for password reset
    if(isset($_POST['reset'])) {
        // Retrieve email from the form
        $email = sanitizeInput($conn, $_POST['email']);

        // Generate a random token
        $token = bin2hex(random_bytes(32)); // Generate a 64-character random hexadecimal string (32 bytes)

        // Prepare a SQL query to update the token
        $sql = "UPDATE registration SET reset_token='$token' WHERE email='$email'";
        
        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Token update successful
            echo "A password reset link has been sent to your email.";

            // Send reset password email with token embedded in the link
            $resetLink = "http://example.com/reset_password.php?email=$email&token=$token"; // Update with your reset password page URL
            $to = $email;
            $subject = 'Password Reset';
            $message = 'To reset your password, please click the following link: ' . $resetLink;
            $headers = 'From: your@example.com'; // Update with your email address

            // Send email
            if (mail($to, $subject, $message, $headers)) {
                echo '<br>Email sent with the password reset instructions.';
            } else {
                echo '<br>Error sending email.';
            }
        } else {
            // Token update failed
            echo "Error updating reset token";
        }
    }
}

// Close the database connection
mysqli_close($conn);
include "index.html";
?>
