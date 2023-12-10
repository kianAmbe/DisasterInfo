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

    // Fetch email addresses from the newsmails table
    $stmtNewsMails = $pdo->prepare("SELECT email FROM newsmails");
    $stmtNewsMails->execute();
    $newsmails = $stmtNewsMails->fetchAll(PDO::FETCH_ASSOC);

    $allEmails = array_merge($users, $newsmails);

    if ($allEmails) {
        // If there are email addresses, proceed with sending the email

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply.safetymatter.alerts@gmail.com'; // Your SMTP username
        $mail->Password = 'ynwh zitf mwit lguu'; // Your SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 587; // Your SMTP server port (e.g., 587 for TLS)

        // Compose the email content
        $message = $_POST['message'];

        $mail->isHTML(true);
        $mail->Subject = 'ANNOUNCEMENT';
        $mail->Body = $message;

        // Loop through email addresses and send email to each
        foreach ($allEmails as $email) {
            $mail->clearAddresses();
            $mail->addAddress($email['email']);
            $mail->send();
        }

        // Redirect to helpdesk.php or any other page after sending emails
        header("Location: helpdesk.php?emails_sent=true");
        exit();
    } else {
        // If there are no email addresses, handle accordingly
        header("Location: helpdesk.php?no_emails=true");
        exit();
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
