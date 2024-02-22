<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "batalion";
    
    
    // Get the submitted email
    $email = $_POST["email"];

    // Connect to the database
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Check if the email exists in the database
    $query = "SELECT * FROM resett WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) 
        // Generate a password reset token
        $token = bin2hex(random_bytes(2));
        
        // Save the token in the database
        $query = "UPDATE resett SET tokens = '$token' WHERE EMAIL = '$email'";
        mysqli_query($conn, $query);
        $query = "SELECT name FROM resett WHERE EMAIL = '$email'";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row["name"];
        }
      
        // Send an email to the user with the password reset link
        $resetLink = "http://localhost/Myproj/Maxwell-University/reset_password.php?token=" . urlencode($token);
        $message = "Hello $name,Kindly click $resetLink reset your password.";
        $subject = "HEALTH  INFORMATION  SYSTEM RESET PASSWORD LINK";
        $senderName = "hmsinfo@gmail.com"; // Replace with your name

        // Load PHPMailer
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        // Create a new PHPMailer instance
        $mailer = new PHPMailer(true);

        try {
            // Enable SMTP debugging (optional)
            // $mailer->SMTPDebug = SMTP::DEBUG_SERVER;

            // Set SMTP parameters
            $mailer->isSMTP();
            $mailer->Host = 'smtp.gmail.com';
            $mailer->SMTPAuth = true;
            $mailer->Username = 'hmsinfo@GMAIL.COM'; // Replace with your Gmail email address
            $mailer->Password = 'lesglfsaqlllbger'; // Replace with your Gmail password
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mailer->Port = 587;

            // Set the sender and recipient
            $mailer->setFrom( $senderName);
            $mailer->addAddress($email);

            // Set email content
            $mailer->Subject = $subject;
            $mailer->Body = $message;
            $mailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            

            // Send the email
            $mailer->send();

            // Email sent successfully
            header("Location: reset_success.php");
            exit();
        } catch (Exception $e) {
            // Failed to send email
            echo "Failed to send password reset email. Error: {$mailer->ErrorInfo}";
        }