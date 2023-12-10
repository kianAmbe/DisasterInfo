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

    // Assuming you have a database connection for reports
    $stmtReports = $pdo->prepare("SELECT emergency_type, description, status FROM report WHERE status = 'In Progress'");
    
    $stmtReports->execute();
    $reports = $stmtReports->fetchAll(PDO::FETCH_ASSOC);

    if ($reports) {
        // If there are completed reports, proceed with sending the email

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply.safetymatter.alerts@gmail.com'; // Your SMTP username
        $mail->Password = 'ynwh zitf mwit lguu'; // Your SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 587; // Your SMTP server port (e.g., 587 for TLS)

        // Loop through users
        foreach ($users as $user) {
            $email = $user['email'];

            // Set email recipient
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Disaster Emergency';

            // Loop through completed reports and add them to the email body
            foreach ($reports as $report) {
                $mail->Body .= '<h2>' . $report['emergency_type'] . '</h2>';
                $mail->Body .= '<p>' . $report['description'] . '</p>';
                $mail->Body .= '<p>' . $report['status'] . '</p>';
                $mail->Body .= '<hr>'; // Add a separator between reports
            }

            // Send email
            $mail->send();

            // Clear recipients and reset the email body for the next iteration
            $mail->clearAddresses();
            $mail->Body = '';
        }

        // Announcements sent successfully, redirect to admin page with a success flag
        header("Location: helpdesk.php?success=true");
        exit();
    } else {
        // If there are no completed reports, redirect to admin page with a no reports flag
        header("Location: helpdesk.php?noreports=true");
        exit();
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
