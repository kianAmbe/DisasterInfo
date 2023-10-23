<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer library and its dependencies
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Database configuration
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'users';

    // Create a database connection
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

    // ... User registration logic, including database insert ...
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change to your SMTP server if not using Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'vcormero48@gmail.com'; // Replace with your Gmail email
        $mail->Password = 'raqj smpk limc owbs'; // Replace with your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('vcormero40@gmail.com', 'Vincent Cormero');
        $mail->addAddress($email); // Use the user's provided email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Registration Confirmation';
        $mail->Body = 'Thank you for registering with our website.';

        $mail->send();
        echo 'Registration successful. An email has been sent to ' . $email;
    } catch (Exception $e) {
        echo 'Error sending email: ' . $mail->ErrorInfo;
    }
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
