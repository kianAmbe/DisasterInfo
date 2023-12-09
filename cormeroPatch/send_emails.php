<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Your email configuration
$mail = new PHPMailer(true);

try {
    // Assuming you have a database connection
    $pdo = new PDO("mysql:host=localhost;dbname=db_sad", 'root', '');

    // Fetch email addresses from the users table
    $stmtUsers = $pdo->prepare("SELECT email FROM user");
    $stmtUsers->execute();
    $users = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);

    if ($users) {
        // If there are users, proceed with sending the email


        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'vcormero48@gmail.com'; // Your SMTP username
        $mail->Password = 'raqj smpk limc owbs'; // Your SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 587; // Your SMTP server port (e.g., 587 for TLS)

        // Compose the email content
        $message = $_POST['message'];

        $mail->isHTML(true);
        $mail->Subject = 'ANNOUNCEMENT';
        $mail->Body = $message;

        // Loop through users and send email to each
        foreach ($users as $user) {
            $email = $user['email'];
            $mail->clearAddresses();
            $mail->addAddress($email);
            $mail->send();
        }

        // Redirect to admin.php or any other page after sending emails
        header("Location: admin.php?emails_sent=true");
        exit();
    } else {
        // If there are no users, handle accordingly
        header("Location: admin.php?no_users=true");
        exit();
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
